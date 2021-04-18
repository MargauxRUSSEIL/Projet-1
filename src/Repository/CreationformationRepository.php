<?php

namespace App\Repository;

use App\Entity\Creationformation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Creationformation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Creationformation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Creationformation[]    findAll()
 * @method Creationformation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CreationformationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Creationformation::class);
    }

    // /**
    //  * @return Creationformation[] Returns an array of Creationformation objects
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
    public function findOneBySomeField($value): ?Creationformation
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
