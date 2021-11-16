<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Table(name="game")
 * @ORM\Entity(repositoryClass=GameRepository::class)
 */
class Game
{
    // /**
    //  * @ORM\Id
    //  * @ORM\GeneratedValue
    //  * @ORM\Column(type="integer")
    //  */
    // private $id;

    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=255)
     */
    private $launchcode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $rtp;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\GameProvider", cascade={"persist"})
     * @ORM\JoinColumn(name="game_provider_id", referencedColumnName="id")
     */
    private $gameProvider;

    public function getLaunchcode(): ?string
    {
        return $this->launchcode;
    }

    public function setLaunchcode(string $launchcode): self
    {
        $this->launchcode = $launchcode;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getRtp(): ?float
    {
        return $this->rtp;
    }

    public function setRtp(?float $rtp): self
    {
        $this->rtp = $rtp;

        return $this;
    }

    public function getGameProvider(): ?GameProvider
    {
        return $this->gameProvider;
    }

    public function setGameProvider(?GameProvider $gameProvider): self
    {
        $this->gameProvider = $gameProvider;

        return $this;
    }
}
