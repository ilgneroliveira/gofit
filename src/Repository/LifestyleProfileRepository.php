<?php

namespace App\Repository;

use App\Entity\LifestyleProfile;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;


/**
 * LifestyleProfileRepository
 *
 * @author  Ilgner Fagundes <ilgner552@izap.com.br>
 * @version 1.0
 */
class LifestyleProfileRepository extends EntityRepository
{
    public function isAlreadyCreate($value)
    {
        $qb = $this->createQueryBuilder('l');
        $qb->select('l');

        $qb->where("l.user = :user")
            ->setParameter('user', $value);

        try {
            /** @var LifestyleProfile $user */
            $user =$qb->getQuery()->getOneOrNullResult();
            if($user){
                return ['is_create' => true];
            }

            return ['is_create' => false];
        } catch (NonUniqueResultException $e) {
            return ['is_create' => false];
        }
    }
}
