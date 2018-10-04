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
    /**
     * @param $value
     * @param $is_get
     *
     * @return LifestyleProfile|array
     */
    public function isAlreadyCreate($value, $is_get)
    {
        $qb = $this->createQueryBuilder('l');
        $qb->select('l');

        $qb->where("l.user = :user")
            ->setParameter('user', $value);

        try {
            /** @var LifestyleProfile $lifestyleProfile */
            $lifestyleProfile =$qb->getQuery()->getOneOrNullResult();

            if($is_get){
                return $lifestyleProfile;
            }

            if($lifestyleProfile){
                return ['is_valid' => true];
            }

            return ['is_valid' => false];
        } catch (NonUniqueResultException $e) {
            return ['is_valid' => false];
        }
    }
}
