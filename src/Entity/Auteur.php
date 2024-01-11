<?php

namespace App\Entity;

use App\Repository\AuteurRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: AuteurRepository::class)]
#[Broadcast]
class Auteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $id_Auteur = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_Auteur = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom_Auteur = null;

    #[ORM\ManyToOne(inversedBy: 'auteurs')]
    private ?Produit $Produit = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAuteur(): ?string
    {
        return $this->id_Auteur;
    }

    public function setIdAuteur(string $id_Auteur): static
    {
        $this->id_Auteur = $id_Auteur;

        return $this;
    }

    public function getNomAuteur(): ?string
    {
        return $this->nom_Auteur;
    }

    public function setNomAuteur(string $nom_Auteur): static
    {
        $this->nom_Auteur = $nom_Auteur;

        return $this;
    }

    public function getPrenomAuteur(): ?string
    {
        return $this->prenom_Auteur;
    }

    public function setPrenomAuteur(string $prenom_Auteur): static
    {
        $this->prenom_Auteur = $prenom_Auteur;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->Produit;
    }

    public function setProduit(?Produit $Produit): static
    {
        $this->Produit = $Produit;

        return $this;
    }
}
