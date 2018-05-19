<?php

namespace App\Controller;

use App\Entity\Exercise;
use App\Entity\ScheduleExercise;
use App\Entity\User;
use App\Enum\MediaType;
use App\Form\Exercise1Type;
use App\Repository\ExerciseRepository;
use App\Repository\ScheduleExerciseRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/schedule")
 */
class ScheduleExerciseController extends Controller
{
    /**
     * @Route("/", name="schedule_index", methods="GET")
     */
    public function index(): Response
    {
        $users = $this->getRepository()->findAll();
        return $this->json($users);
    }

    /**
     * @Route("/new", name="schedule_new", methods="POST")
     */
    public function schedule(Request $request): Response
    {
        $data = (array)json_decode($request->getContent());

        /** @var User $user */
        $user = $this->getUserRepository()->find($data['user_id']);

        if ($user === null) {
            return $this->json(['success' => 0, 'message' => 'Agedamento não efetuado, dados do usuário não encontrado']);
        }

        /** @var Exercise $exercise */
        $exercise = $this->getRepository()->find($data['exercise_id']);

        if ($exercise === null) {
            return $this->json(['success' => 0, 'message' => 'Agedamento não efetuado, dados do exercício não encontrado']);
        }

        $date = new \DateTime($data['date']);
        if (!$date) {
            $result = ['success' => 0, 'message' => 'Agedamento não efetuado, data inválida'];
            return $this->json($result);
        }

        $schedule_exercise = new ScheduleExercise();
        $schedule_exercise->setSchenduleDate($date);
        $schedule_exercise->setUser($user);
        $schedule_exercise->setExercise($exercise);

        try {
            $em = $this->getDoctrine()->getManager();
            $em->persist($schedule_exercise);
            $em->flush();

            $result = ['success' => 1, 'message' => 'Agendamento salvo'];
            return $this->json($result);
        } catch (\Exception $exception) {
            $result = ['success' => 0, 'message' => 'Agedamento não efetuado', 'error' => $exception->getMessage()];
            return $this->json($result);
        }
    }

    /**
     * @Route("/list", name="schedule_list", methods="POST")
     */
    public function listByUser(Request $request): Response
    {
        $data = (array)json_decode($request->getContent());
        /** @var User $user */
        $user = $this->getUserRepository()->find($data['user_id']);
        if ($user === null) {
            return $this->json(['success' => 0, 'message' => 'Dados do usuário não encontrado']);
        }

        $schedules = $this->getRepository()->listByUser($user->getId());
        return $this->json($schedules);
    }

    /**
     * @Route("/{id}", name="schedule_delete", methods="DELETE")
     */
    public function delete(Request $request, Exercise $exercise): Response
    {
        try{
            $em = $this->getDoctrine()->getManager();
            $em->remove($exercise);
            $em->flush();

            return $this->json(['success' => 0, 'message' => 'Agendamento excluído']);
        }catch (\Exception $exception){
            return $this->json(['success' => 0, 'message' => 'Erro ao excluír agendamento']);
        }
    }

    /**
     * @return ScheduleExerciseRepository|\Doctrine\Common\Persistence\ObjectRepository
     */
    private function getRepository()
    {
        return $this->getDoctrine()->getRepository(ScheduleExercise::class);
    }

    /**
     * @return UserRepository|\Doctrine\Common\Persistence\ObjectRepository
     */
    private function getUserRepository()
    {
        return $this->getDoctrine()->getRepository(User::class);
    }
}
