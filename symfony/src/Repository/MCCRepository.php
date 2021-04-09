<?php

namespace App\Repository;

use App\Entity\MCC;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MCC|null find($id, $lockMode = null, $lockVersion = null)
 * @method MCC|null findOneBy(array $criteria, array $orderBy = null)
 * @method MCC[]    findAll()
 * @method MCC[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MCCRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MCC::class);
    }

    // /**
    //  * @return MCC[] Returns an array of MCC objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MCC
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
