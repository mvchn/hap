<?php

namespace App\Repository;

use App\Entity\Hap;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * @method Hap|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hap|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hap[]    findAll()
 * @method Hap[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HapRepository extends ServiceEntityRepository
{
    CONST PAGINATOR_PER_PAGE = 2;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hap::class);
    }

    // /**
    //  * @return Hap[] Returns an array of Hap objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Hap
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
