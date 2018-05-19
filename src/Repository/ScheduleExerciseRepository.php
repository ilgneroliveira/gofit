<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;


/**
 * ScheduleExerciseRepository
 *
 * @author  Ilgner Fagundes <ilgner552@izap.com.br>
 * @version 1.0
 */
class ScheduleExerciseRepository extends EntityRepository
{
    public function listByUser($user_id)
    {
        $qb = $this->createQueryBuilder('s');
        $qb->select('s','u','e')
            ->join('s.user', 'u')
            ->join('s.exercise', 'e')
            ->where('s.user = :user_id')
            ->setParameter('user_id', $user_id);

        return $qb->getQuery()->getArrayResult();
    }
}