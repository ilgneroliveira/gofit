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
            /** @var LifestyleProfile $lifestyleProfile */
            $lifestyleProfile =$qb->getQuery()->getOneOrNullResult();
            if($lifestyleProfile){
                return ['is_valid' => true];
            }

            return ['is_valid' => false];
        } catch (NonUniqueResultException $e) {
            return ['is_valid' => false];
        }
    }
}
