<?php

namespace App\Entity;

use App\Repository\GameCountryBlockRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="game_country_block", uniqueConstraints={@ORM\UniqueConstraint(name="uniq_GameCountryBlock_Game", columns={"launchcode"})})
 * @ORM\Entity(repositoryClass=GameCountryBlockRepository::class)
 */
class GameCountryBlock
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Game::class, inversedBy="gameCountryBlocks", cascade={"persist"})
     * @ORM\JoinColumn(name="launchcode", referencedColumnName="launchcode", nullable=false)
     */
    private $launchcode;

    /**
     * @ORM\Column(type="integer")
     */
    private $brandid;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $country;

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

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

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
