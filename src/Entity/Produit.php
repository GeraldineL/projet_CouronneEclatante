<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\ManyToOne(inversedBy: 'produits')]
    private ?DetailsCommande $DetailsCommande = null;

    #[ORM\OneToMany(mappedBy: 'Produit', targetEntity: Auteur::class)]
    private Collection $auteurs;

    #[ORM\OneToMany(mappedBy: 'Produit', targetEntity: Categorie::class)]
    private Collection $categories;

    public function __construct()
    {
        $this->auteurs = new ArrayCollection();
        $this->categories = new ArrayCollection();
    }

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

    public function getDetailsCommande(): ?DetailsCommande
    {
        return $this->DetailsCommande;
    }

    public function setDetailsCommande(?DetailsCommande $DetailsCommande): static
    {
        $this->DetailsCommande = $DetailsCommande;

        return $this;
    }

    /**
     * @return Collection<int, Auteur>
     */
    public function getAuteurs(): Collection
    {
        return $this->auteurs;
    }

    public function addAuteur(Auteur $auteur): static
    {
        if (!$this->auteurs->contains($auteur)) {
            $this->auteurs->add($auteur);
            $auteur->setProduit($this);
        }

        return $this;
    }

    public function removeAuteur(Auteur $auteur): static
    {
        if ($this->auteurs->removeElement($auteur)) {
            // set the owning side to null (unless already changed)
            if ($auteur->getProduit() === $this) {
                $auteur->setProduit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Categorie>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categorie $category): static
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
            $category->setProduit($this);
        }

        return $this;
    }

    public function removeCategory(Categorie $category): static
    {
        if ($this->categories->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getProduit() === $this) {
                $category->setProduit(null);
            }
        }

        return $this;
    }
}
