<?php

namespace App\DataFixtures;

use App\Entity\Game;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class GameFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $gameProviderRepo = $manager->getRepository('App\Entity\GameProvider');

        $listGames = [
            [
                "launchcode" => "game1",
                "name" => "Game 1",
                "rtp" => 0.23,
                "game_provider" => $gameProviderRepo->find(1),
            ],
            [
                "launchcode" => "game2",
                "name" => "Game 2",
                "rtp" => 0.50,
                "game_provider" => $gameProviderRepo->find(2),
            ],
            [
                "launchcode" => "game3",
                "name" => "Game 3",
                "rtp" => 0.45,
                "game_provider" => $gameProviderRepo->find(3),
            ],
            [
                "launchcode" => "game4",
                "name" => "Game 4",
                "rtp" => 0.33,
                "game_provider" => $gameProviderRepo->find(4),
            ],
            [
                "launchcode" => "game5",
                "name" => "Game 5",
                "rtp" => 0.23,
                "game_provider" => $gameProviderRepo->find(1),
            ],
            [
                "launchcode" => "game6",
                "name" => "Game 6",
                "rtp" => 0.50,
                "game_provider" => $gameProviderRepo->find(2),
            ],
            [
                "launchcode" => "game7",
                "name" => "Game 7",
                "rtp" => 0.45,
                "game_provider" => $gameProviderRepo->find(3),
            ],
            [
                "launchcode" => "game8",
                "name" => "Game 8",
                "rtp" => 0.33,
                "game_provider" => $gameProviderRepo->find(4),
            ],
            [
                "launchcode" => "game9",
                "name" => "Game 9",
                "rtp" => 0.33,
                "game_provider" => $gameProviderRepo->find(3),
            ],
        ];

        foreach ($listGames as $value) {
            $game = new Game();
            $game->setLaunchcode($value["launchcode"]);
            $game->setName($value["name"]);
            $game->setRtp($value["rtp"]);
            $game->setGameProvider($value["game_provider"]);

            $manager->persist($game);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            GameProviderFixtures::class,
        ];
    }
}
