<?php

namespace App\Repository;

use App\Entity\ParentPereMere;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ParentPereMere|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParentPereMere|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParentPereMere[]    findAll()
 * @method ParentPereMere[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParentPereMereRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ParentPereMere::class);
    }

    // /**
    //  * @return ParentPereMere[] Returns an array of ParentPereMere objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ParentPereMere
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
