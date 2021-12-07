<?php

namespace App\DataFixtures;

use App\Entity\BrandGame;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BrandGameFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $gameRepo = $manager->getRepository('App\Entity\Game');

        $listBrandGames = [
            [
                "launchcode" => $gameRepo->findOneBy(["launchcode" => "game1"]),
                "brandid" => 1,
                "category" => "Category 1",
                "hot" => true,
                "new" => false,
            ],
            [
                "launchcode" => $gameRepo->findOneBy(["launchcode" => "game1"]),
                "brandid" => 2,
                "category" => "Category 1",
                "hot" => true,
                "new" => false,
            ],
            [
                "launchcode" => $gameRepo->findOneBy(["launchcode" => "game2"]),
                "brandid" => 1,
                "category" => "Category 1",
                "hot" => true,
                "new" => false,
            ],
            [
                "launchcode" => $gameRepo->findOneBy(["launchcode" => "game3"]),
                "brandid" => 1,
                "category" => "Category 1",
                "hot" => true,
                "new" => false,
            ],
            [
                "launchcode" => $gameRepo->findOneBy(["launchcode" => "game4"]),
                "brandid" => 1,
                "category" => "Category 3",
                "hot" => true,
                "new" => false,
            ],
            [
                "launchcode" => $gameRepo->findOneBy(["launchcode" => "game5"]),
                "brandid" => 1,
                "category" => "Category 1",
                "hot" => true,
                "new" => false,
            ],
            [
                "launchcode" => $gameRepo->findOneBy(["launchcode" => "game6"]),
                "brandid" => 1,
                "category" => "Category 1",
                "hot" => true,
                "new" => false,
            ],
            [
                "launchcode" => $gameRepo->findOneBy(["launchcode" => "game7"]),
                "brandid" => 1,
                "category" => "Category 1",
                "hot" => true,
                "new" => false,
            ],
            [
                "launchcode" => $gameRepo->findOneBy(["launchcode" => "game8"]),
                "brandid" => 2,
                "category" => "Category 2",
                "hot" => true,
                "new" => false,
            ],
            [
                "launchcode" => $gameRepo->findOneBy(["launchcode" => "game9"]),
                "brandid" => 1,
                "category" => "Category 1",
                "hot" => true,
                "new" => false,
            ],
        ];

        foreach ($listBrandGames as $value) {
            $brandGame = new BrandGame();
            $brandGame->setGame($value["launchcode"]);
            $brandGame->setBrandid($value["brandid"]);
            $brandGame->setCategory($value["category"]);
            $brandGame->setHot($value["hot"]);
            $brandGame->setNew($value["new"]);

            $manager->persist($brandGame);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            GameFixtures::class,
        ];
    }
}
