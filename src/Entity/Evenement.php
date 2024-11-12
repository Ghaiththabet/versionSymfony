<?php

namespace App\Entity;

use App\Repository\EvenementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvenementRepository::class)]
class Evenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $EventName = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $EventDate = null;

    #[ORM\Column(length: 50)]
    private ?string $EventPlace = null;

    #[ORM\Column(length: 255)]
    private ?string $EventDesc = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEventName(): ?string
    {
        return $this->EventName;
    }

    public function setEventName(string $EventName): static
    {
        $this->EventName = $EventName;

        return $this;
    }

    public function getEventDate(): ?\DateTimeInterface
    {
        return $this->EventDate;
    }

    public function setEventDate(\DateTimeInterface $EventDate): static
    {
        $this->EventDate = $EventDate;

        return $this;
    }

    public function getEventPlace(): ?string
    {
        return $this->EventPlace;
    }

    public function setEventPlace(string $EventPlace): static
    {
        $this->EventPlace = $EventPlace;

        return $this;
    }

    public function getEventDesc(): ?string
    {
        return $this->EventDesc;
    }

    public function setEventDesc(string $EventDesc): static
    {
        $this->EventDesc = $EventDesc;

        return $this;
    }
}
