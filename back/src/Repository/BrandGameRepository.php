<?php

namespace App\Repository;

use App\Entity\BrandGame;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BrandGame|null find($id, $lockMode = null, $lockVersion = null)
 * @method BrandGame|null findOneBy(array $criteria, array $orderBy = null)
 * @method BrandGame[]    findAll()
 * @method BrandGame[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BrandGameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BrandGame::class);
    }

    // /**
    //  * @return BrandGame[] Returns an array of BrandGame objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BrandGame
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
