<?php

namespace App\Entity;

use App\Repository\CoursRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoursRepository::class)]
class Cours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $CoursTitle = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CoursDesc = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $CoursRessources = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoursTitle(): ?string
    {
        return $this->CoursTitle;
    }

    public function setCoursTitle(string $CoursTitle): static
    {
        $this->CoursTitle = $CoursTitle;

        return $this;
    }

    public function getCoursDesc(): ?string
    {
        return $this->CoursDesc;
    }

    public function setCoursDesc(?string $CoursDesc): static
    {
        $this->CoursDesc = $CoursDesc;

        return $this;
    }

    public function getCoursRessources(): array
    {
        return $this->CoursRessources;
    }

    public function setCoursRessources(array $CoursRessources): static
    {
        $this->CoursRessources = $CoursRessources;

        return $this;
    }
}
