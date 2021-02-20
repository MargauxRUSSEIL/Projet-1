<?php

namespace App\Repository;

use App\Entity\FormationNonDiplomante;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FormationNonDiplomante|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormationNonDiplomante|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormationNonDiplomante[]    findAll()
 * @method FormationNonDiplomante[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormationNonDiplomanteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FormationNonDiplomante::class);
    }

    // /**
    //  * @return FormationNonDiplomante[] Returns an array of FormationNonDiplomante objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FormationNonDiplomante
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
