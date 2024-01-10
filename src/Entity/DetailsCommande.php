<?php

namespace App\Entity;

use App\Repository\DetailsCommandeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DetailsCommandeRepository::class)]
class DetailsCommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $id_details_commande = null;

    #[ORM\Column(length: 255)]
    private ?string $lib_details_commande = null;

    #[ORM\Column(length: 255)]
    private ?string $lib_produit = null;

    #[ORM\Column(length: 255)]
    private ?string $Quantite_produit = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdDetailsCommande(): ?string
    {
        return $this->id_details_commande;
    }

    public function setIdDetailsCommande(string $id_details_commande): static
    {
        $this->id_details_commande = $id_details_commande;

        return $this;
    }

    public function getLibDetailsCommande(): ?string
    {
        return $this->lib_details_commande;
    }

    public function setLibDetailsCommande(string $lib_details_commande): static
    {
        $this->lib_details_commande = $lib_details_commande;

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

    public function getQuantiteProduit(): ?string
    {
        return $this->Quantite_produit;
    }

    public function setQuantiteProduit(string $Quantite_produit): static
    {
        $this->Quantite_produit = $Quantite_produit;

        return $this;
    }
}
