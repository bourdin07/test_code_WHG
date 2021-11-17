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
 * @method Game|null find($id, $lockMode = null, $lockVersion = null)
 * @method Game|null findOneBy(array $criteria, array $orderBy = null)
 * @method Game[]    findAll()
 * @method Game[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Game::class);
    }

    public function getListGames($brandid, $country, $category)
    {
        $a = "g";
        $qb = $this->createQueryBuilder($a);
        $qb->addSelect($a)
            ->join(GameBrandBlock::class, "gbb", Join::WITH, "g.launchcode = gbb.game")
            ->join(GameCountryBlock::class, "gcb", Join::WITH, "g.launchcode = gcb.game")
            ->join(BrandGame::class, "bg", Join::WITH, "g.launchcode = bg.game")
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
    //  * @return Game[] Returns an array of Game objects
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
    public function findOneBySomeField($value): ?Game
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
