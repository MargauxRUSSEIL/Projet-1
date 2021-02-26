<?php

namespace App\Repository;

use App\Entity\CoutHETD;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CoutHETD|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoutHETD|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoutHETD[]    findAll()
 * @method CoutHETD[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoutHETDRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoutHETD::class);
    }

    // /**
    //  * @return CoutHETD[] Returns an array of CoutHETD objects
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
    public function findOneBySomeField($value): ?CoutHETD
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
