<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
#[Broadcast]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $id_utilisateur = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_utilisateur = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom_utilisateur = null;

    #[ORM\Column(length: 255)]
    private ?string $Tel_utilisateur = null;

    #[ORM\Column(length: 255)]
    private ?string $Adresse_facturation = null;

    #[ORM\Column(length: 255)]
    private ?string $Ville_facturation = null;

    #[ORM\Column(length: 255)]
    private ?string $Code_facturation = null;

    #[ORM\OneToMany(mappedBy: 'Utilisateur', targetEntity: Commande::class)]
    private Collection $commandes;

    #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: Commande::class)]
    private Collection $Commande;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
        $this->Commande = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUtilisateur(): ?string
    {
        return $this->id_utilisateur;
    }

    public function setIdUtilisateur(string $id_utilisateur): static
    {
        $this->id_utilisateur = $id_utilisateur;

        return $this;
    }

    public function getNomUtilisateur(): ?string
    {
        return $this->nom_utilisateur;
    }

    public function setNomUtilisateur(string $nom_utilisateur): static
    {
        $this->nom_utilisateur = $nom_utilisateur;

        return $this;
    }

    public function getPrenomUtilisateur(): ?string
    {
        return $this->prenom_utilisateur;
    }

    public function setPrenomUtilisateur(string $prenom_utilisateur): static
    {
        $this->prenom_utilisateur = $prenom_utilisateur;

        return $this;
    }

    public function getTelUtilisateur(): ?string
    {
        return $this->Tel_utilisateur;
    }

    public function setTelUtilisateur(string $Tel_utilisateur): static
    {
        $this->Tel_utilisateur = $Tel_utilisateur;

        return $this;
    }

    public function getAdresseFacturation(): ?string
    {
        return $this->Adresse_facturation;
    }

    public function setAdresseFacturation(string $Adresse_facturation): static
    {
        $this->Adresse_facturation = $Adresse_facturation;

        return $this;
    }

    public function getVilleFacturation(): ?string
    {
        return $this->Ville_facturation;
    }

    public function setVilleFacturation(string $Ville_facturation): static
    {
        $this->Ville_facturation = $Ville_facturation;

        return $this;
    }

    public function getCodeFacturation(): ?string
    {
        return $this->Code_facturation;
    }

    public function setCodeFacturation(string $Code_facturation): static
    {
        $this->Code_facturation = $Code_facturation;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): static
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes->add($commande);
            $commande->setUtilisateur($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): static
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getUtilisateur() === $this) {
                $commande->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommande(): Collection
    {
        return $this->Commande;
    }
}
