<?php

namespace App\Repository;

use App\Entity\Examin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Examin|null find($id, $lockMode = null, $lockVersion = null)
 * @method Examin|null findOneBy(array $criteria, array $orderBy = null)
 * @method Examin[]    findAll()
 * @method Examin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExaminRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Examin::class);
    }

    // /**
    //  * @return Examin[] Returns an array of Examin objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Examin
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
