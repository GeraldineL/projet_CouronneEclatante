<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $lib_categorie = null;

    #[ORM\Column(length: 255)]
    private ?string $id_categorie = null;

    #[ORM\Column(length: 255)]
    private ?string $Titre_livre = null;

    #[ORM\Column(length: 255)]
    private ?string $ProgrammeCE1 = null;

    #[ORM\Column(length: 255)]
    private ?string $ProgrammeCE2 = null;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: Produit::class)]
    private Collection $produits;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibCategorie(): ?string
    {
        return $this->lib_categorie;
    }

    public function setLibCategorie(string $lib_categorie): static
    {
        $this->lib_categorie = $lib_categorie;

        return $this;
    }

    public function getIdCategorie(): ?string
    {
        return $this->id_categorie;
    }

    public function setIdCategorie(string $id_categorie): static
    {
        $this->id_categorie = $id_categorie;

        return $this;
    }

    public function getTitreLivre(): ?string
    {
        return $this->Titre_livre;
    }

    public function setTitreLivre(string $Titre_livre): static
    {
        $this->Titre_livre = $Titre_livre;

        return $this;
    }

    public function getProgrammeCE1(): ?string
    {
        return $this->ProgrammeCE1;
    }

    public function setProgrammeCE1(string $ProgrammeCE1): static
    {
        $this->ProgrammeCE1 = $ProgrammeCE1;

        return $this;
    }

    public function getProgrammeCE2(): ?string
    {
        return $this->ProgrammeCE2;
    }

    public function setProgrammeCE2(string $ProgrammeCE2): static
    {
        $this->ProgrammeCE2 = $ProgrammeCE2;

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): static
    {
        if (!$this->produits->contains($produit)) {
            $this->produits->add($produit);
            $produit->setCategorie($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): static
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getCategorie() === $this) {
                $produit->setCategorie(null);
            }
        }

        return $this;
    }
}
