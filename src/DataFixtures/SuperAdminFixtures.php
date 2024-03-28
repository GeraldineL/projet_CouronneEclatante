<?php

namespace App\DataFixtures;

use App\Entity\User;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class SuperAdminFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $hasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $superAdmin = $this->createSuperAdmin();

        $manager->persist($superAdmin);/* je demande au gestionnaire des données de faire persister les données  */

        $manager->flush();
    }

    private function createSuperAdmin(): User
    {
        /* je créé la variable $superAdmin et j'importe User */
        $superAdmin = new User();

        /* Je demande au hacheur de me hacher le mot de passe qui est aux normes de la CNIL: 12 caractères minimum avec au moins 1 lettre miniscule, majuscule, chiffre, carctère spécial */
        $passwordHashed = $this->hasher->hashPassword($superAdmin, "azerty1234A*");

        $superAdmin->setPrenom("Couronne");/* j'initialise la valeur du prénom */
        $superAdmin->setNom("Eclatante");
        $superAdmin->setEmail("couronneclatante@gmail.com");
        $superAdmin->setRoles(['ROLE_SUPER_ADMIN', 'ROLE_ADMIN', 'ROLE_USER']);/* Cette ligne me permet avec la méthode setRoles de définir les rôles de super_admin, d'admin et d'utilisateur */
        $superAdmin->setPassword($passwordHashed);
        $superAdmin->setPassword($passwordHashed);
        // $superAdmin->setIsVerified(true);
        // $superAdmin->setCreatedAt(new DateTimeImmutable());
        // $superAdmin->setVerifiedAt(new DateTimeImmutable());
        // $superAdmin->setUpdateAt(new DateTimeImmutable());
        $superAdmin->setTelephone("0689765489");
        $superAdmin->setAdresseFacturation("Adresse à définir");
        $superAdmin->getVilleFacturation("Ville à définir");
        $superAdmin->getCodeFacturation("code postal à définir");

        return $superAdmin;
    }
}
