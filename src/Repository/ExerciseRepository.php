<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;


/**
 * ExerciseRepository
 *
 * @author  Ilgner Fagundes <ilgner552@izap.com.br>
 * @version 1.0
 */
class ExerciseRepository extends EntityRepository
{
    public function search($search_term)
    {
        $qb = $this->createQueryBuilder('e');
        $qb->select('e')
            ->where('e.title LIKE :search_term')
            ->orWhere('e.description LIKE :search_term')
            ->setParameter('search_term', '%'.$search_term.'%');

        return $qb->getQuery()->getArrayResult();
    }
}