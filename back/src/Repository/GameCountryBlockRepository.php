<?php

namespace App\Repository;

use App\Entity\GameCountryBlock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GameCountryBlock|null find($id, $lockMode = null, $lockVersion = null)
 * @method GameCountryBlock|null findOneBy(array $criteria, array $orderBy = null)
 * @method GameCountryBlock[]    findAll()
 * @method GameCountryBlock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GameCountryBlockRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GameCountryBlock::class);
    }

    public function getByBrandidCountry($brandid, $country)
    {
        $a = "brandGame";
        $qb = $this->createQueryBuilder($a);

        $qb->select($a)
            ->where("$a.brandid = :brandid OR $a.brandid = 0")
            ->andWhere("$a.country = :country")
            ->setParameters(["brandid" => $brandid, "country" => $country]);

        return $qb->getQuery()->getResult();
    }

    // /**
    //  * @return GameCountryBlock[] Returns an array of GameCountryBlock objects
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
    public function findOneBySomeField($value): ?GameCountryBlock
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
