<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $id_commande = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCommande(): ?string
    {
        return $this->id_commande;
    }

    public function setIdCommande(string $id_commande): static
    {
        $this->id_commande = $id_commande;

        return $this;
    }
}
