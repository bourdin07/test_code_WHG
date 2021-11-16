<?php

namespace App\Entity;

use App\Repository\GameBrandBlockRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="game_brand_block", uniqueConstraints={@ORM\UniqueConstraint(name="uniq_GameBrandBlock_Game", columns={"launchcode"})})
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
     * @ORM\ManyToOne(targetEntity=Game::class, inversedBy="gameBrandBlocks", cascade={"persist"})
     * @ORM\JoinColumn(name="launchcode", referencedColumnName="launchcode", nullable=false)
     */
    private $launchcode;

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

    public function getLaunchcode(): ?Game
    {
        return $this->launchcode;
    }

    public function setLaunchcode(?Game $gameLaunchcode): self
    {
        $this->launchcode = $gameLaunchcode;

        return $this;
    }
}
