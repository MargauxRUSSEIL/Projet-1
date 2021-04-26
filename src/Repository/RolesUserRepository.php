<?php

namespace App\Repository;

use App\Entity\RolesUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RolesUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method RolesUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method RolesUser[]    findAll()
 * @method RolesUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RolesUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RolesUser::class);
    }

    // /**
    //  * @return RolesUser[] Returns an array of RolesUser objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RolesUser
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
