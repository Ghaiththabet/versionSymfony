<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idUser = null;

    #[ORM\Column(length: 50)]
    private ?string $Username = null;

    #[ORM\Column(length: 100)]
    private ?string $UserEmail = null;

    #[ORM\Column(length: 255)]
    private ?string $UserPwd = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(int $idUser): static
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->Username;
    }

    public function setUsername(string $Username): static
    {
        $this->Username = $Username;

        return $this;
    }

    public function getUserEmail(): ?string
    {
        return $this->UserEmail;
    }

    public function setUserEmail(string $UserEmail): static
    {
        $this->UserEmail = $UserEmail;

        return $this;
    }

    public function getUserPwd(): ?string
    {
        return $this->UserPwd;
    }

    public function setUserPwd(string $UserPwd): static
    {
        $this->UserPwd = $UserPwd;

        return $this;
    }
}
