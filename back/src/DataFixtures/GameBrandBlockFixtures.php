<?php

namespace App\DataFixtures;

use App\Entity\GameBrandBlock;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class GameBrandBlockFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $gameRepo = $manager->getRepository('App\Entity\Game');

        $listGameBrandBlocks = [
            [
                "launchcode" => $gameRepo->findOneBy(["launchcode" => "game1"]),
                "brandid" => 1,
            ],
            [
                "launchcode" => $gameRepo->findOneBy(["launchcode" => "game2"]),
                "brandid" => 1,
            ],
            [
                "launchcode" => $gameRepo->findOneBy(["launchcode" => "game3"]),
                "brandid" => 0,
            ],
            [
                "launchcode" => $gameRepo->findOneBy(["launchcode" => "game4"]),
                "brandid" => 2,
            ],
            [
                "launchcode" => $gameRepo->findOneBy(["launchcode" => "game5"]),
                "brandid" => 0,
            ],
            [
                "launchcode" => $gameRepo->findOneBy(["launchcode" => "game6"]),
                "brandid" => 1,
            ],
            [
                "launchcode" => $gameRepo->findOneBy(["launchcode" => "game7"]),
                "brandid" => 4,
            ],
            [
                "launchcode" => $gameRepo->findOneBy(["launchcode" => "game8"]),
                "brandid" => 3,
            ],
        ];

        foreach ($listGameBrandBlocks as $value) {
            $gameBrandBlock = new GameBrandBlock();
            $gameBrandBlock->setGame($value["launchcode"]);
            $gameBrandBlock->setBrandid($value["brandid"]);

            $manager->persist($gameBrandBlock);
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
