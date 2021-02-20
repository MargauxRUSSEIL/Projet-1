<?php

namespace App\Repository;

use App\Entity\SessionUnique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SessionUnique|null find($id, $lockMode = null, $lockVersion = null)
 * @method SessionUnique|null findOneBy(array $criteria, array $orderBy = null)
 * @method SessionUnique[]    findAll()
 * @method SessionUnique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SessionUniqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SessionUnique::class);
    }

    // /**
    //  * @return SessionUnique[] Returns an array of SessionUnique objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SessionUnique
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
