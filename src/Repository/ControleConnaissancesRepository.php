<?php

namespace App\Repository;

use App\Entity\ControleConnaissances;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ControleConnaissances|null find($id, $lockMode = null, $lockVersion = null)
 * @method ControleConnaissances|null findOneBy(array $criteria, array $orderBy = null)
 * @method ControleConnaissances[]    findAll()
 * @method ControleConnaissances[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ControleConnaissancesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ControleConnaissances::class);
    }

    // /**
    //  * @return ControleConnaissances[] Returns an array of ControleConnaissances objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ControleConnaissances
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
