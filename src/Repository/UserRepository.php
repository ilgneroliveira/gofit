<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;


/**
 * UserRepository
 *
 * @author  Ilgner Fagundes <ilgner552@izap.com.br>
 * @version 1.0
 */
class UserRepository extends EntityRepository
{

    /**
     * @param $email
     * @param $password
     *
     * @return array
     */
    public function authenticate($email, $password)
    {
        $qb = $this->createQueryBuilder('u');
        $qb->select('u')
            ->where('u.email = :email')
            ->andWhere('u.password = :password')
            ->setParameter('email', $email)
            ->setParameter('password', $password);

        try {
            /** @var User $user */
            $user =$qb->getQuery()->getOneOrNullResult();
            if($user){

                return ['is_valid' => true, 'id'=>$user->getId()];
            }

            return ['is_valid' => false];
        } catch (NonUniqueResultException $e) {
            return ['is_valid' => false];
        }
    }

    /**
     * @param      $value
     * @param bool $is_email
     *
     * @return array
     */
    public function isAlreadyRegistered($value, $is_email = false)
    {
        $qb = $this->createQueryBuilder('u');
        $qb->select('u');

        $column = $is_email?'email':'login';
        $qb->where("u.{$column} = :value")
            ->setParameter('value', $value);

        try {
            /** @var User $user */
            $user =$qb->getQuery()->getOneOrNullResult();
            if($user){
                return ['is_valid' => true, 'id'=>$user->getId()];
            }

            return ['is_valid' => false];
        } catch (NonUniqueResultException $e) {
            return ['is_valid' => false];
        }
    }
}
