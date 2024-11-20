<?php

namespace App\Entity;

use App\Enum\TypeEvent;
use App\Repository\EvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    

    /**
     * @var Collection<int, Utilisateur>
     */
    #[ORM\OneToMany(targetEntity: Utilisateur::class, mappedBy: 'evenement')]
    private Collection $utilisateurs;

    /**
     * @var Collection<int, Projet>
     */
    #[ORM\OneToMany(targetEntity: Projet::class, mappedBy: 'evenement')]
    private Collection $projets;

    #[ORM\Column(nullable: true, enumType: TypeEvent::class)]
    private ?TypeEvent $TypeEvenemnt = null;

    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
        $this->projets = new ArrayCollection();
    }

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

    

    

    /**
     * @return Collection<int, Utilisateur>
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateur $utilisateur): static
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs->add($utilisateur);
            $utilisateur->setEvenement($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Projet>
     */
    public function getProjets(): Collection
    {
        return $this->projets;
    }

    public function addProjet(Projet $projet): static
    {
        if (!$this->projets->contains($projet)) {
            $this->projets->add($projet);
            $projet->setEvenement($this);
        }

        return $this;
    }

    public function removeProjet(Projet $projet): static
    {
        if ($this->projets->removeElement($projet)) {
            // set the owning side to null (unless already changed)
            if ($projet->getEvenement() === $this) {
                $projet->setEvenement(null);
            }
        }

        return $this;
    }

    public function getTypeEvenemnt(): ?TypeEvent
    {
        return $this->TypeEvenemnt;
    }

    public function setTypeEvenemnt(?TypeEvent $TypeEvenemnt): static
    {
        $this->TypeEvenemnt = $TypeEvenemnt;

        return $this;
    }

    
}
