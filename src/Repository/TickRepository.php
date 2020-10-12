<?php

namespace App\Repository;

use App\Entity\Hap;
use App\Entity\Tick;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tick|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tick|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tick[]    findAll()
 * @method Tick[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TickRepository extends ServiceEntityRepository
{
    CONST PAGINATOR_PER_PAGE = 2;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tick::class);
    }

    public function getTicksPaginator(Hap $hap, int $offset): Paginator
    {
        $query = $this->createQueryBuilder('t')
            ->andWhere('t.hap = :hap')
            ->setParameter('hap', $hap)
            ->orderBy('t.id', 'DESC')
            ->setMaxResults(self::PAGINATOR_PER_PAGE)
            ->setFirstResult($offset)
            ->getQuery()
        ;

        return new Paginator($query);
    }

    // /**
    //  * @return Tick[] Returns an array of Tick objects
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
    public function findOneBySomeField($value): ?Tick
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
