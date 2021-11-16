<?php

namespace App\Entity;

use App\Repository\BrandGameRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="brand_games")
 * @ORM\Entity(repositoryClass=BrandGameRepository::class)
 */
class BrandGame
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

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $category;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hot;

    /**
     * @ORM\Column(type="boolean")
     */
    private $new;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrandid(): ?string
    {
        return $this->brandid;
    }

    public function setBrandid(?string $brandid): self
    {
        $this->brandid = $brandid;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getHot(): ?bool
    {
        return $this->hot;
    }

    public function setHot(bool $hot): self
    {
        $this->hot = $hot;

        return $this;
    }

    public function getNew(): ?bool
    {
        return $this->new;
    }

    public function setNew(bool $new): self
    {
        $this->new = $new;

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
