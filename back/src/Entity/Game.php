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

    /**
     * @ORM\OneToMany(targetEntity=BrandGame::class, mappedBy="launchcode", cascade={"persist"}, orphanRemoval=true)
     */
    private $brandGames;

    /**
     * @ORM\OneToMany(targetEntity=GameBrandBlock::class, mappedBy="launchcode", cascade={"persist"}, orphanRemoval=true)
     */
    private $gameBrandBlocks;

    /**
     * @ORM\OneToMany(targetEntity=GameCountryBlock::class, mappedBy="launchcode", cascade={"persist"}, orphanRemoval=true)
     */
    private $gameCountryBlocks;

    public function __construct()
    {
        $this->brandGames = new ArrayCollection();
        $this->gameBrandBlocks = new ArrayCollection();
        $this->gameCountryBlocks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

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

    public function getBrandGames(): Collection
    {
        return $this->brandGames;
    }

    public function addBrandGame(BrandGame $brandGame): self
    {
        if (!$this->brandGames->contains($brandGame)) {
            $this->brandGames[] = $brandGame;
            $brandGame->setLaunchcode($this);
        }

        return $this;
    }

    public function removeBrandGame(BrandGame $brandGame): self
    {
        if ($this->brandGames->removeElement($brandGame)) {
            // set the owning side to null (unless already changed)
            if ($brandGame->getLaunchcode() === $this) {
                $brandGame->setLaunchcode(null);
            }
        }

        return $this;
    }

    public function getGameBrandBlocks(): Collection
    {
        return $this->gameBrandBlocks;
    }

    public function addGameBrandBlock(GameBrandBlock $gameBrandBlock): self
    {
        if (!$this->gameBrandBlocks->contains($gameBrandBlock)) {
            $this->gameBrandBlocks[] = $gameBrandBlock;
            $gameBrandBlock->setLaunchcode($this);
        }

        return $this;
    }

    public function removeGameBrandBlock(GameBrandBlock $gameBrandBlock): self
    {
        if ($this->gameBrandBlocks->removeElement($gameBrandBlock)) {
            // set the owning side to null (unless already changed)
            if ($gameBrandBlock->getLaunchcode() === $this) {
                $gameBrandBlock->setLaunchcode(null);
            }
        }

        return $this;
    }

    public function getGameCountryBlocks(): Collection
    {
        return $this->gameCountryBlocks;
    }

    public function addGameCountryBlock(GameCountryBlock $gameCountryBlock): self
    {
        if (!$this->gameCountryBlocks->contains($gameCountryBlock)) {
            $this->gameCountryBlocks[] = $gameCountryBlock;
            $gameCountryBlock->setLaunchcode($this);
        }

        return $this;
    }

    public function removeGameCountryBlock(GameCountryBlock $gameCountryBlock): self
    {
        if ($this->gameCountryBlocks->removeElement($gameCountryBlock)) {
            // set the owning side to null (unless already changed)
            if ($gameCountryBlock->getLaunchcode() === $this) {
                $gameCountryBlock->setLaunchcode(null);
            }
        }

        return $this;
    }
}
