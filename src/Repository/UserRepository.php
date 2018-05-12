<?php

namespace App\Repository;

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

    public function authenticate($email, $password)
    {
        $qb = $this->createQueryBuilder('u');
        $qb->select('count(u.id)')
            ->where('u.email = :email')
            ->andWhere('u.password = :password')
            ->setParameter('email', $email)
            ->setParameter('password', $password);

        try {
            if($qb->getQuery()->getSingleScalarResult() > 0){
                return true;
            }

            return false;
        } catch (NonUniqueResultException $e) {
            return false;
        }
    }

    public function isAlreadyRegistered($id)
    {
        $qb = $this->createQueryBuilder('u');
        $qb->select('count(u.id)')
            ->where('u.login = :id')
            ->setParameter('id', $id);

        try {
            if($qb->getQuery()->getSingleScalarResult() > 0){
                return true;
            }

            return false;
        } catch (NonUniqueResultException $e) {
            return false;
        }
    }
}