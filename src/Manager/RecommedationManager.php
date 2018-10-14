<?php

namespace App\Manager;


use App\Entity\Exercise;
use App\Entity\ExerciseRecommedation;
use App\Entity\LifestyleProfile;
use App\Entity\User;
use App\Repository\ExerciseRecommedationRepository;
use App\Repository\ExerciseRepository;
use App\Repository\UserRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * RecommedationManager
 * @author  Ilgner Fagundes <ilgner.fagundes@izap.com.br>
 * @version 1.0
 */
class RecommedationManager
{
    /** @var ExerciseRecommedation[] */
    public $exercises_process;

    /** @var User  */
    public $user;

    /** @var ManagerRegistry */
    private $doctrine;

    /**
     * RecommedationManager constructor.
     *
     * @param ManagerRegistry $doctrine
     * @param                 $user_id
     */
    public function __construct(ManagerRegistry $doctrine, $user_id)
    {
        $this->doctrine = $doctrine;
        $this->user = $this->getUserRepository()->findBy(['login' => $user_id]);
        $this->exercises_process = $this->findExercisesProcess();
    }

    /**
     * @return ManagerRegistry
     */
    public function getDoctrine(): ManagerRegistry
    {
        return $this->doctrine;
    }

    /**
     * @param LifestyleProfile $lifestyle_profile
     * @param Exercise[]       $exercises
     *
     * @return Exercise[]
     */
    public function process($lifestyle_profile, $exercises)
    {
        foreach ($exercises as $exercise) {
            if ($this->isProcess($exercise)) {
                continue;
            }

            $p1 = ($lifestyle_profile->getPhysicalActivityD() - $exercise->getQuestionOne()) ** 2;
            $p2 = ($lifestyle_profile->getPhysicalActivityE() - $exercise->getQuestionTwo()) ** 2;
            $p3 = ($lifestyle_profile->getPhysicalActivityF() - $exercise->getQuestionThree()) ** 2;

            $exercise_recommedation = new ExerciseRecommedation();
            $exercise_recommedation->setUser($this->user);
            $exercise_recommedation->setExercise($exercise);
            $exercise_recommedation->setDistance(sqrt($p1 + $p2 + $p3));

            $em = $this->getDoctrine()->getManager();
            $em->persist($exercise_recommedation);
            $em->flush();
        }

        return $this->getExerciseRecommedationRepository()->findBy([], ['distance' => 'ASC']);
    }

    /**
     * @param Exercise $exercise
     *
     * @return bool
     */
    public function isProcess(Exercise $exercise)
    {
        if(!$this->exercises_process){
            return false;
        }

        return array_key_exists($exercise->getId(), $this->exercises_process);
    }

    /**
     * @return ExerciseRecommedationRepository|\Doctrine\Common\Persistence\ObjectRepository
     */
    private function getExerciseRecommedationRepository()
    {
        return $this->getDoctrine()->getRepository(ExerciseRecommedation::class);
    }

    /**
     * @return UserRepository|\Doctrine\Common\Persistence\ObjectRepository
     */
    private function getUserRepository()
    {
        return $this->getDoctrine()->getRepository(User::class);
    }

    private function findExercisesProcess()
    {
        if (empty($this->exercises_process)) {
            $exercises_process = $this->getExerciseRecommedationRepository()->findBy(['user' => $this->user]);

            /** @var ExerciseRecommedation $exercise_process */
            foreach ($exercises_process as $exercise_process) {
                $this->exercises_process[$exercise_process->getExercise()->getId()] = $exercise_process;
            }
        }

        return $this->exercises_process;
    }
}
