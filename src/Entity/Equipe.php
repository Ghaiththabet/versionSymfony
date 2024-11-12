<?php

namespace App\Entity;

use App\Repository\EquipeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EquipeRepository::class)]
class Equipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $membres = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMembres(): array
    {
        return $this->membres;
    }

    public function setMembres(array $membres): static
    {
        $this->membres = $membres;

        return $this;
    }
}
