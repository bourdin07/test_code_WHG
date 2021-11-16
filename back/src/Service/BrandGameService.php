<?php


namespace App\Service;

use App\Entity\BrandGame;
use App\Entity\Game;
use App\Entity\GameBrandBlock;
use App\Entity\GameCountryBlock;
use App\Repository\BrandGameRepository;
use App\Repository\GameBrandBlockRepository;
use App\Repository\GameCountryBlockRepository;
use App\Repository\GameRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

class BrandGameService
{
    /** @var EntityManagerInterface */
    protected $manager;

    /** @var BrandGameRepository */
    protected $brandGameRepo;

    /** @var GameBrandBlockRepository */
    protected $gameBrandBlockRepo;

    /** @var GameCountryBlockRepository */
    protected $gameCountryBlockRepo;

    /** @var LoggerInterface */
    protected $logger;

    /**
     * BrandGameService constructor.
     * @param EntityManagerInterface $manager
     * @param LoggerInterface $logger
     */
    public function __construct(EntityManagerInterface $manager, LoggerInterface $logger)
    {
        $this->manager = $manager;
        $this->brandGameRepo = $manager->getRepository(BrandGame::class);
        $this->gameBrandBlockRepo = $manager->getRepository(GameBrandBlock::class);
        $this->gameCountryBlockRepo = $manager->getRepository(GameCountryBlock::class);
        $this->logger = $logger;
    }

    public function getListGames($brandid, $country, $category)
    {
        $listBrandGameToReturn = [];

        $listGameBrandBlock = $this->gameBrandBlockRepo->getByBrandid($brandid);
        $listGameCountryBlock = $this->gameCountryBlockRepo->getByBrandidCountry($brandid, $country);

        if ($category == "all") {
            $listBrandGame = $this->brandGameRepo->findBy(["brandid" => $brandid]);
        } else {
            $listBrandGame = $this->brandGameRepo->findBy(["brandid" => $brandid, "category" => $category]);
        }

        foreach ($listBrandGame as $key => $brandGame) {
            $add = true;

            /**
             * @var GameBrandBlock $gameBrandBlock
             */
            foreach ($listGameBrandBlock as $key => $gameBrandBlock) {
                if ($brandGame->getGame()->getLaunchcode() === $gameBrandBlock->getGame()->getLaunchcode()) {
                    $add = false;
                    break;
                }
            }

            /**
             * @var GameCountryBlock $gameCountryBlock
             */
            foreach ($listGameCountryBlock as $key => $gameCountryBlock) {
                if ($brandGame->getGame()->getLaunchcode() === $gameCountryBlock->getGame()->getLaunchcode()) {
                    $add = false;
                    break;
                }
            }

            if ($add) {
                $listBrandGameToReturn[] = $brandGame;
            }
        }

        return $listBrandGameToReturn;
    }
}
