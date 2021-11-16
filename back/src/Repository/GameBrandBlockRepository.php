<?php

namespace App\Repository;

use App\Entity\GameBrandBlock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GameBrandBlock|null find($id, $lockMode = null, $lockVersion = null)
 * @method GameBrandBlock|null findOneBy(array $criteria, array $orderBy = null)
 * @method GameBrandBlock[]    findAll()
 * @method GameBrandBlock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GameBrandBlockRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GameBrandBlock::class);
    }

    public function getByBrandid($brandid)
    {
        $a = "brandGame";
        $qb = $this->createQueryBuilder($a);

        $qb->select($a)
            ->where("$a.brandid = :brandid OR $a.brandid = 0")
            ->setParameters(["brandid" => $brandid]);

        return $qb->getQuery()->getResult();
    }

    // /**
    //  * @return GameBrandBlock[] Returns an array of GameBrandBlock objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GameBrandBlock
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
