<?php

namespace App\Repository;

use App\Entity\NoteExaminEleve;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NoteExaminEleve|null find($id, $lockMode = null, $lockVersion = null)
 * @method NoteExaminEleve|null findOneBy(array $criteria, array $orderBy = null)
 * @method NoteExaminEleve[]    findAll()
 * @method NoteExaminEleve[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NoteExaminEleveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NoteExaminEleve::class);
    }

    // /**
    //  * @return NoteExaminEleve[] Returns an array of NoteExaminEleve objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NoteExaminEleve
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
