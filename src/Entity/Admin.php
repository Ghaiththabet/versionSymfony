<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdminRepository::class)]
class Admin extends Utilisateur
{
    

    public function getId(): ?int
    {
        return parent::getId();
    }
}
