<?php

namespace App\Repository;

use App\Entity\BrandGame;
use App\Entity\Game;
use App\Entity\GameBrandBlock;
use App\Entity\GameCountryBlock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
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

    public function getListBrandGames($brandid, $country, $category)
    {
        $a = "bg";
        $qb = $this->createQueryBuilder($a);
        $qb->addSelect($a)
            ->join(Game::class, "g", Join::WITH, "g.launchcode = bg.game")
            ->join(GameBrandBlock::class, "gbb", Join::WITH, "g.launchcode = gbb.game")
            ->join(GameCountryBlock::class, "gcb", Join::WITH, "g.launchcode = gcb.game")
            ->where("bg.brandid = :brandid")
            ->andWhere("gbb.brandid <> :brandid")
            ->andWhere("gbb.brandid <> 0")
            ->andWhere("gcb.brandid <> :brandid")
            ->andWhere("gcb.country <> :country")
            ->andWhere("gcb.brandid <> 0");

        if ($category !== "all") {
            $qb->andWhere("bg.category = :category")
                ->setParameters(["brandid" => $brandid, "country" => $country, "category" => $category]);
        } else {
            $qb->setParameters(["brandid" => $brandid, "country" => $country]);
        }

        return $qb->getQuery()->getResult();
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
