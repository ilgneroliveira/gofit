<?php

namespace App\Controller;

use App\Entity\Exercise;
use App\Entity\ExercisesDone;
use App\Entity\User;
use App\Form\ExercisesDoneType;
use App\Repository\ExerciseRepository;
use App\Repository\ExercisesDoneRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/exercises/done")
 */
class ExercisesDoneController extends Controller
{
    /**
     * @Route("/", name="exercises_done_index", methods="GET")
     */
    public function index(): Response
    {
        $exercisesDone = $this->getRepository()->findAll();
        return $this->json($exercisesDone);
    }

    /**
     * @Route("/new", name="exercise_done_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $data = (array)json_decode($request->getContent());

        /** @var User $user */
        $user = $this->getUserRepository()->findOneBy(["login" => $data['user_id']]);

        if ($user === null) {
            return $this->json(
                ['success' => 0, 'message' => 'Perfil do estilo de vida não salvo, dados do usuário não encontrado']
            );
        }

        /** @var Exercise $exercise */
        $exercise = $this->getExerciseRepository()->findOneBy(["id" => $data['exercise_id']]);

        if ($exercise === null) {
            return $this->json(
                ['success' => 0, 'message' => 'Histórico não salvo, dados do Exercício não encontrado']
            );
        }

        $lifestyle_profile = new ExercisesDone();
        $lifestyle_profile->setExercise($exercise);
        $lifestyle_profile->setExecuteAt(new \DateTime());
        $lifestyle_profile->setTimeExecute($data['time_execute']);
        $lifestyle_profile->setUser($user);

        try {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lifestyle_profile);
            $em->flush();

            $result = ['success' => 1, 'message' => 'Histórico salvo'];

            return $this->json($result);
        } catch (\Exception $exception) {
            $result = [
                'success' => 0,
                'message' => 'Histórico não salvo',
                'error' => $exception->getMessage(),
            ];

            return $this->json($result);
        }
    }

    /**
     * @Route("/{id}", name="exercises_done_show", methods="GET")
     */
    public function show(ExercisesDone $exercisesDone): Response
    {
        return $this->json($exercisesDone);
    }

    /**
     * @Route("/{id}/edit", name="exercises_done_edit", methods="GET|POST")
     */
    public function edit(Request $request, ExercisesDone $exercisesDone): Response
    {
        $form = $this->createForm(ExercisesDoneType::class, $exercisesDone);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('exercises_done_edit', ['id' => $exercisesDone->getId()]);
        }

        return $this->render('exercises_done/edit.html.twig', [
            'exercises_done' => $exercisesDone,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/user", name="find_user", methods="POST")
     */
    public function findByUser(Request $request): Response
    {
        $data = (array)json_decode($request->getContent());

        if (!isset($data['id'])) {
            return $this->json(['is_valid' => false]);
        }

        $result = $this->getRepository()->findBy(['user' => $data['id']]);

        return $this->json(['exercisesDone' => $result]);
    }

    /**
     * @return ExercisesDoneRepository|\Doctrine\Common\Persistence\ObjectRepository
     */
    private function getRepository()
    {
        return $this->getDoctrine()->getRepository(ExercisesDone::class);
    }

    /**
     * @return ExerciseRepository|\Doctrine\Common\Persistence\ObjectRepository
     */
    private function getExerciseRepository()
    {
        return $this->getDoctrine()->getRepository(Exercise::class);
    }
    /**
     * @return UserRepository|\Doctrine\Common\Persistence\ObjectRepository
     */
    private function getUserRepository()
    {
        return $this->getDoctrine()->getRepository(User::class);
    }
}
