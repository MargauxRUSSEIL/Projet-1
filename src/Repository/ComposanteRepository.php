<?php

namespace App\Repository;

use App\Entity\Composante;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Composante|null find($id, $lockMode = null, $lockVersion = null)
 * @method Composante|null findOneBy(array $criteria, array $orderBy = null)
 * @method Composante[]    findAll()
 * @method Composante[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComposanteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Composante::class);
    }

    // /**
    //  * @return Composante[] Returns an array of Composante objects
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
    public function findOneBySomeField($value): ?Composante
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
