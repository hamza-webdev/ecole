<?php

namespace App\Repository;

use App\Entity\TypeExamin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeExamin|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeExamin|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeExamin[]    findAll()
 * @method TypeExamin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeExaminRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeExamin::class);
    }

    // /**
    //  * @return TypeExamin[] Returns an array of TypeExamin objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeExamin
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
