<?php

namespace App\Service;

use App\Entity\Game;
use App\Repository\GameRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class GameService
{
    /** @var EntityManagerInterface */
    protected $manager;

    /** @var GameRepository */
    protected $gameRepo;

    /** @var LoggerInterface */
    protected $logger;

    /**
     * GameService constructor.
     * @param EntityManagerInterface $manager
     * @param LoggerInterface $logger
     */
    public function __construct(EntityManagerInterface $manager, LoggerInterface $logger)
    {
        $this->manager = $manager;
        $this->gameRepo = $manager->getRepository(Game::class);
        $this->logger = $logger;
    }

    public function getListGames($brandid, $country, $category)
    {
        return $this->gameRepo->getListGames($brandid, $country, $category);
    }
}
