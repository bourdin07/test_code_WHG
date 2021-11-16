<?php

namespace App\Entity;

use App\Repository\GameProviderRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="game_providers")
 * @ORM\Entity(repositoryClass=GameProviderRepository::class)
 */
class GameProvider
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
