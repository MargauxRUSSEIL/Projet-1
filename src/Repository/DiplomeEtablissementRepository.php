<?php

namespace App\Repository;

use App\Entity\DiplomeEtablissement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DiplomeEtablissement|null find($id, $lockMode = null, $lockVersion = null)
 * @method DiplomeEtablissement|null findOneBy(array $criteria, array $orderBy = null)
 * @method DiplomeEtablissement[]    findAll()
 * @method DiplomeEtablissement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiplomeEtablissementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DiplomeEtablissement::class);
    }

    // /**
    //  * @return DiplomeEtablissement[] Returns an array of DiplomeEtablissement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DiplomeEtablissement
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
