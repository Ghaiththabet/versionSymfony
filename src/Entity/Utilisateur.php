<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UtilisateurRepository;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
#[ORM\Table(name: 'users')]
#[ORM\InheritanceType("JOINED")]
#[ORM\DiscriminatorColumn(name: "role", type: "string")]
#[ORM\DiscriminatorMap(["admin" => Admin::class, "etudiant" => Etudiant::class, "enseignant" => Enseignant::class])]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $username = null;

    #[ORM\Column(length: 100)]
    private ?string $userEmail = null;

    #[ORM\Column(length: 255)]
    private ?string $userPwd = null;

    #[ORM\Column(type: "json")]
    private array $roles = [];

    #[ORM\ManyToOne(targetEntity: Evenement::class, inversedBy: 'utilisateurs')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Evenement $evenement = null;

    // Cette propriété est maintenant utilisée uniquement pour la hiérarchie d'héritage.
    // Vous n'avez pas besoin de la déclarer en tant que colonne séparée ici.
    // #[ORM\Column(length: 50, nullable: true)]
    // private ?string $role = null; 

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;
        return $this;
    }

    public function getUserEmail(): ?string
    {
        return $this->userEmail;
    }

    public function setUserEmail(string $userEmail): static
    {
        $this->userEmail = $userEmail;
        return $this;
    }

    public function getUserPwd(): ?string
    {
        return $this->userPwd;
    }

    public function setUserPwd(string $userPwd): static
    {
        $this->userPwd = $userPwd;
        return $this;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;
        return $this;
    }
    public function getEvenement(): ?Evenement
    {
        return $this->evenement;
    }

    public function setEvenement(Evenement $evenement): static
    {
        $this->evenement = $evenement;

        return $this;
    }

    // La méthode setRole n'est plus nécessaire
    // Vous pouvez utiliser setRoles pour gérer les rôles et la hiérarchie d'entité.
    
    public function __construct()
{
    // S'assurer que si le tableau $roles est vide, on attribue un rôle par défaut.

}
    
}





