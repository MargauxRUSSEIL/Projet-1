<?php

namespace App\Repository;

use App\Entity\NbGroupeTypeCoursHasCours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NbGroupeTypeCoursHasCours|null find($id, $lockMode = null, $lockVersion = null)
 * @method NbGroupeTypeCoursHasCours|null findOneBy(array $criteria, array $orderBy = null)
 * @method NbGroupeTypeCoursHasCours[]    findAll()
 * @method NbGroupeTypeCoursHasCours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NbGroupeTypeCoursHasCoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NbGroupeTypeCoursHasCours::class);
    }

    // /**
    //  * @return NbGroupeTypeCoursHasCours[] Returns an array of NbGroupeTypeCoursHasCours objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NbGroupeTypeCoursHasCours
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
