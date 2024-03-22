<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'Commande', targetEntity: DetailsCommande::class)]
    private Collection $detailsCommandes;

    #[ORM\Column(length: 255)]
    private ?string $User = null;

    // #[ORM\Column(length: 255)]
    // private ?string $manytoone = null;

    #[ORM\ManyToOne(inversedBy: 'Commande')]
    private ?User $user = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'DetailsCommande')]
    private ?self $detailscommande = null;

    #[ORM\OneToMany(mappedBy: 'detailscommande', targetEntity: self::class)]
    private Collection $DetailsCommande;

    public function __construct()
    {
        $this->detailsCommandes = new ArrayCollection();
        $this->DetailsCommande = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, DetailsCommande>
     */
    public function getDetailsCommandes(): Collection
    {
        return $this->detailsCommandes;
    }

    public function addDetailsCommande(DetailsCommande $detailsCommande): static
    {
        if (!$this->detailsCommandes->contains($detailsCommande)) {
            $this->detailsCommandes->add($detailsCommande);
            $detailsCommande->setCommande($this);
        }

        return $this;
    }

    public function removeDetailsCommande(DetailsCommande $detailsCommande): static
    {
        if ($this->detailsCommandes->removeElement($detailsCommande)) {
            // set the owning side to null (unless already changed)
            if ($detailsCommande->getCommande() === $this) {
                $detailsCommande->setCommande(null);
            }
        }

        return $this;
    }

    public function getUser(): ?string
    {
        return $this->User;
    }

    public function setUser(string $User): static
    {
        $this->User = $User;

        return $this;
    }

    // public function getManytoone(): ?string
    // {
    //     return $this->manytoone;
    // }

    // public function setManytoone(string $manytoone): static
    // {
    //     $this->manytoone = $manytoone;

    //     return $this;
    // }

    public function getDetailscommande(): ?self
    {
        return $this->detailscommande;
    }

    public function setDetailscommande(?self $detailscommande): static
    {
        $this->detailscommande = $detailscommande;

        return $this;
    }
}
