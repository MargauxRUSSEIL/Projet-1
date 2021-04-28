<?php

namespace App\Repository;

use App\Entity\ModalitePedagogique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ModalitePedagogique|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModalitePedagogique|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModalitePedagogique[]    findAll()
 * @method ModalitePedagogique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModalitePedagogiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModalitePedagogique::class);
    }

    // /**
    //  * @return ModalitePedagogique[] Returns an array of ModalitePedagogique objects
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
    public function findOneBySomeField($value): ?ModalitePedagogique
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
