<?php

namespace App\Repository;

use App\Entity\ControleConnaissance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ControleConnaissance|null find($id, $lockMode = null, $lockVersion = null)
 * @method ControleConnaissance|null findOneBy(array $criteria, array $orderBy = null)
 * @method ControleConnaissance[]    findAll()
 * @method ControleConnaissance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ControleConnaissanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ControleConnaissance::class);
    }

    // /**
    //  * @return ControleConnaissance[] Returns an array of ControleConnaissance objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ControleConnaissance
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
