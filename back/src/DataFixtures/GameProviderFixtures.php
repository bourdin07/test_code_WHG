<?php

namespace App\DataFixtures;

use App\Entity\GameProvider;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GameProviderFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $listProviders = [
            [
                "name" => "Provider 1"
            ],
            [
                "name" => "Provider 2"
            ],
            [
                "name" => "Provider 3"
            ],
            [
                "name" => "Provider 4"
            ],
            [
                "name" => "Provider 5"
            ],
            [
                "name" => "Provider 6"
            ],
            [
                "name" => "Provider 7"
            ],
            [
                "name" => "Provider 8"
            ],
            [
                "name" => "Provider 9"
            ],
            [
                "name" => "Provider 10"
            ],
        ];

        foreach ($listProviders as $_provider) {
            $provider = new GameProvider();
            $provider->setName($_provider["name"]);

            $manager->persist($provider);
        }

        $manager->flush();
    }
}
