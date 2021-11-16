<?php

namespace App\Entity;

use App\Repository\GameBrandBlockRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="game_brand_block")
 * @ORM\Entity(repositoryClass=GameBrandBlockRepository::class)
 */
class GameBrandBlock
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Game::class, cascade={"persist"})
     * @ORM\JoinColumn(name="launchcode", referencedColumnName="launchcode", nullable=false)
     */
    private $game;

    /**
     * @ORM\Column(type="integer")
     */
    private $brandid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrandid(): ?int
    {
        return $this->brandid;
    }

    public function setBrandid(int $brandid): self
    {
        $this->brandid = $brandid;

        return $this;
    }

    public function getGame(): ?Game
    {
        return $this->game;
    }

    public function setGame(?Game $game): self
    {
        $this->game = $game;

        return $this;
    }
}
