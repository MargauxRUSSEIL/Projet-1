<?php

namespace App\Repository;

use App\Entity\NbGroupeTypeCours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NbGroupeTypeCours|null find($id, $lockMode = null, $lockVersion = null)
 * @method NbGroupeTypeCours|null findOneBy(array $criteria, array $orderBy = null)
 * @method NbGroupeTypeCours[]    findAll()
 * @method NbGroupeTypeCours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NbGroupeTypeCoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NbGroupeTypeCours::class);
    }

    // /**
    //  * @return NbGroupeTypeCours[] Returns an array of NbGroupeTypeCours objects
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
    public function findOneBySomeField($value): ?NbGroupeTypeCours
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
