<?php

namespace App\Entity;

use App\Repository\UserRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
/* Classe importée à partir de la documentation Symfony Notblank : https://symfony.com/doc/current/reference/constraints/NotBlank.html*/
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /* #[Assert\NotBlank] ci-dessous a été copié/collé à partir de la documentation Symfony Notblank-Tant que l'utilisateur n'a pas rempli son mail, il ne pourra jamais envoyer le formulaire */
    #[Assert\NotBlank(message: "L' email est obligatoire.")]
    #[Assert\Length(
        max: 180,
        maxMessage: "L' email ne doit pas dépasser {{ limit }} caractères", 
    )] 
    #[Assert\Email(
        message: 'L\'email {{ value }} n\'est pas valide.',
    )]   
    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[Assert\NotBlank(message: "Le mot de passe est obligatoire.")]
    #[Assert\Length(
        min: 12,
        max: 255,
        minMessage: "Le mot de passe doit contenir au minimum {{ limit }} caractères.",
        maxMessage: "Le mot de passe doit contenir au maximum {{ limit }} caractères.",
    )]
    /* Cette partie ci-dessous correspond aux contraintes pour le mot de passe-fait avec aide de Jean-Claude/Consultation des documents symfony */
     #[Assert\Regex(
        pattern: "/^(?=.*[a-zà-ÿ])(?=.*[A-ZÀ-Ỳ])(?=.*[0-9])(?=.*[^a-zà-ÿA-ZÀ-Ỳ0-9]).{11,255}$/",
        match: true,
        message: "Le mot de passe doit contentir au moins une lettre miniscule, majuscule, un chiffre et un caractère spécial.",
    )]
    #[Assert\NotCompromisedPassword(message: "Ce mot de passe est facilement piratable! Veuillez en choisir un autre.")]
    #[ORM\Column] 
    private ?string $password = null;


    #[Assert\NotBlank(message: "Le nom est obligatoire.")]
    /* #[Assert\Length] ci-dessous a été copié/collé à partir de la documentation Symfony*/
    #[Assert\Length(
        min: 2,
        max: 255,
        maxMessage: 'Le nom ne doit pas dépasser {{ limit }} caractères', )]
        /* #[Assert\Regex] ci-dessous a été copié/collé à partir de la documentation Symfony*/
    #[Assert\Regex(
            pattern: "/^[0-9a-zA-Z-_' áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ]+$/i",
            match: true,
            message: " Le nom doit contenir uniquement des lettres, des chiffres,le tiret du milieu de l'undescore",
        )]
    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    // #[ORM\Column(type: 'datetime_immutable', options: ['default' => 'CURRENT_TIMESTAMP'])]
    // private $createdAt;
     /* #[Assert\NotBlank] ci-dessous a été copié/collé à partir de la documentation Symfony Notblank-Tant que l'utilisateur n'a pas rempli son prénom, il ne pourra jamais envoyer le formulaire */
    #[Assert\NotBlank(message: "Le prénom est obligatoire.")]
    /* #[Assert\Length] ci-dessous a été copié/collé à partir de la documentation Symfony*/
    #[Assert\Length(
        min: 2,
        max: 255,
        maxMessage: 'Le prénom ne doit pas dépasser {{ limit }} caractères', )]
        /* #[Assert\Regex] ci-dessous a été copié/collé à partir de la documentation Symfony*/
    #[Assert\Regex(
            pattern: "/^[0-9a-zA-Z-_' áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ]+$/i",
            match: true,
            message: " Le prénom doit contenir uniquement des lettres, des chiffres,le tiret du milieu de l'undescore",
        )]
    #[ORM\Column(length: 255)]
    private ?string $prenom = null;



    #[Assert\NotBlank(message: "Le numéro de téléphone est obligatoire.")]
    #[Assert\Length(
        min: 6,
        max: 255,
        minMessage: 'Le numéro de téléphone doit contenir au moins {{ limit }} caractères',
        maxMessage: 'Le numéro de téléphone ne doit pas dépasser {{ limit }} caractères'
    )]
    #[Assert\Regex(
        pattern: "/^[0-9\-\+\s\(\)]+$/",
        match: true,
        message: " Le numéro de téléphone n'est pas valide.",
    )]
    #[ORM\Column(length: 255)]
    private ?string $telephone = null;


    #[Assert\NotBlank(message: "L'adresse est obligatoire.")]
    #[Assert\Length(
        max: 255,
        maxMessage: 'L\'adresse ne doit pas dépasser {{ limit }} caractères'
    )]
    /* Axe d'amélioration pour la suite, proposer un système de connexion à google map pour vérifier si l'adresse est réelle et valide */
    #[ORM\Column(length: 255)]
    private ?string $adresseFacturation = null;


    #[Assert\NotBlank(message: "La ville est obligatoire.")]
    #[Assert\Length(
        max: 255,
        maxMessage: 'La ville de facturation ne doit pas dépasser {{ limit }} caractères'
    )]
    #[ORM\Column(length: 255)]
    private ?string $villeFacturation = null;


    #[Assert\NotBlank(message: "Le code de facturation est obligatoire.")]
    #[Assert\Length(
        max: 255,
        maxMessage: 'Le code de facturation ne doit pas dépasser {{ limit }} caractères'
    )]
    #[ORM\Column(length: 255)]
    private ?string $codeFacturation = null;


    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Commande::class)]
    private Collection $Commande;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;



    public function __construct()
    {
        //$this->createdAt = new \DateTimeImmutable();  
				# En d'autres termes, cette ligne est utilisée pour définir 
				#la valeur de la propriété "created_at" sur la date et l'heure 
				#actuelles.
    $this->Commande = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';// toute personne connectée a le rôle USER

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdresseFacturation(): ?string
    {
        return $this->adresseFacturation;
    }

    public function setAdresseFacturation(?string $adresseFacturation): static
    {
        $this->adresseFacturation = $adresseFacturation;

        return $this;
    }

    public function getVilleFacturation(): ?string
    {
        return $this->villeFacturation;
    }

    public function setVilleFacturation(?string $VilleFacturation): static
    {
        $this->villeFacturation = $VilleFacturation;

        return $this;
    }

    public function getCodeFacturation(): ?string
    {
        return $this->codeFacturation;
    }

    public function setCodeFacturation(?string $codeFacturation): static
    {
        $this->codeFacturation = $codeFacturation;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommande(): Collection
    {
        return $this->Commande;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

}