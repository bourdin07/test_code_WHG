<?php

namespace App\DataFixtures;

use App\Entity\GameCountryBlock;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class GameCountryBlockFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $gameRepo = $manager->getRepository('App\Entity\Game');

        $listGameBrandBlocks = [
            [
                "launchcode" => $gameRepo->findOneBy(["launchcode" => "game1"]),
                "brandid" => 1,
                "country" => "FR",
            ],
            [
                "launchcode" => $gameRepo->findOneBy(["launchcode" => "game2"]),
                "brandid" => 1,
                "country" => "UK",
            ],
            [
                "launchcode" => $gameRepo->findOneBy(["launchcode" => "game3"]),
                "brandid" => 0,
                "country" => "US",
            ],
            [
                "launchcode" => $gameRepo->findOneBy(["launchcode" => "game4"]),
                "brandid" => 2,
                "country" => "CS",
            ],
            [
                "launchcode" => $gameRepo->findOneBy(["launchcode" => "game5"]),
                "brandid" => 0,
                "country" => "FR",
            ],
            [
                "launchcode" => $gameRepo->findOneBy(["launchcode" => "game6"]),
                "brandid" => 1,
                "country" => "CS",
            ],
            [
                "launchcode" => $gameRepo->findOneBy(["launchcode" => "game7"]),
                "brandid" => 4,
                "country" => "KR",
            ],
            [
                "launchcode" => $gameRepo->findOneBy(["launchcode" => "game8"]),
                "brandid" => 3,
                "country" => "CN",
            ],
            [
                "launchcode" => $gameRepo->findOneBy(["launchcode" => "game8"]),
                "brandid" => 0,
                "country" => "UK",
            ],
        ];

        foreach ($listGameBrandBlocks as $value) {
            $gameCountryBlock = new GameCountryBlock();
            $gameCountryBlock->setGame($value["launchcode"]);
            $gameCountryBlock->setBrandid($value["brandid"]);
            $gameCountryBlock->setCountry($value["country"]);

            $manager->persist($gameCountryBlock);
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
