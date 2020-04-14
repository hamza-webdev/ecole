<?php

namespace App\Repository;

use App\Entity\Proffesseur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Proffesseur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Proffesseur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Proffesseur[]    findAll()
 * @method Proffesseur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProffesseurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Proffesseur::class);
    }

    // /**
    //  * @return Proffesseur[] Returns an array of Proffesseur objects
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
    public function findOneBySomeField($value): ?Proffesseur
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
