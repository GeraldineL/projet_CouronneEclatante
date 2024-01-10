<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $id_produit = null;

    #[ORM\Column(length: 255)]
    private ?string $lib_produit = null;

    #[ORM\Column(length: 255)]
    private ?string $categorie_produit = null;

    #[ORM\Column(length: 255)]
    private ?string $Prix_produit = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdProduit(): ?string
    {
        return $this->id_produit;
    }

    public function setIdProduit(string $id_produit): static
    {
        $this->id_produit = $id_produit;

        return $this;
    }

    public function getLibProduit(): ?string
    {
        return $this->lib_produit;
    }

    public function setLibProduit(string $lib_produit): static
    {
        $this->lib_produit = $lib_produit;

        return $this;
    }

    public function getCategorieProduit(): ?string
    {
        return $this->categorie_produit;
    }

    public function setCategorieProduit(string $categorie_produit): static
    {
        $this->categorie_produit = $categorie_produit;

        return $this;
    }

    public function getPrixProduit(): ?string
    {
        return $this->Prix_produit;
    }

    public function setPrixProduit(string $Prix_produit): static
    {
        $this->Prix_produit = $Prix_produit;

        return $this;
    }
}
