<?php

namespace App\Repository;

use App\Entity\MatiereCour;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MatiereCour|null find($id, $lockMode = null, $lockVersion = null)
 * @method MatiereCour|null findOneBy(array $criteria, array $orderBy = null)
 * @method MatiereCour[]    findAll()
 * @method MatiereCour[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MatiereCourRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MatiereCour::class);
    }

    // /**
    //  * @return MatiereCour[] Returns an array of MatiereCour objects
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
    public function findOneBySomeField($value): ?MatiereCour
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
