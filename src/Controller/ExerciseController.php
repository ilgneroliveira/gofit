<?php

namespace App\Controller;

use App\Entity\Exercise;
use App\Entity\ScheduleExercise;
use App\Entity\User;
use App\Enum\MediaType;
use App\Form\Exercise1Type;
use App\Repository\ExerciseRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/exercise")
 */
class ExerciseController extends Controller
{
    /**
     * @Route("/", name="exercise_index", methods="GET")
     */
    public function index(): Response
    {
        $users = $this->getRepository()->findAll();
        return $this->json($users);
    }

    /**
     * @Route("/new", name="exercise_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $exercise = new Exercise();
        $form = $this->createForm(Exercise1Type::class, $exercise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($exercise);
            $em->flush();

            return $this->redirectToRoute('exercise_index');
        }

        return $this->render('exercise/new.html.twig', [
            'exercise' => $exercise,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/search", name="exercise_search", methods="POST")
     */
    public function search(Request $request): Response
    {
        $data = (array)json_decode($request->getContent());

        if (!isset($data['search_term'])) {
            return $this->json(['exercises' => []]);
        }

        $exercises = $this->getRepository()->search($data['search_term']);

        return $this->json(['exercises' => $exercises]);
    }

    /**
     * @Route("/{id}", name="exercise_show", methods="GET")
     */
    public function show(Exercise $exercise): Response
    {
        return $this->json($exercise);
    }

    /**
     * @Route("/{id}/edit", name="exercise_edit", methods="GET|POST")
     */
    public function edit(Request $request, Exercise $exercise): Response
    {
        $form = $this->createForm(Exercise1Type::class, $exercise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('exercise_edit', ['id' => $exercise->getId()]);
        }

        return $this->render('exercise/edit.html.twig', [
            'exercise' => $exercise,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="exercise_delete", methods="DELETE")
     */
    public function delete(Request $request, Exercise $exercise): Response
    {
        if ($this->isCsrfTokenValid('delete' . $exercise->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($exercise);
            $em->flush();
        }

        return $this->redirectToRoute('exercise_index');
    }

    /**
     * @return ExerciseRepository|\Doctrine\Common\Persistence\ObjectRepository
     */
    private function getRepository()
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
