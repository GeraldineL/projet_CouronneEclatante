<?php

namespace App\DataFixtures;

use App\Entity\User;
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

        $manager->persist($superAdmin);

        $manager->flush();
    }

    private function createSuperAdmin(): User
    {
        $superAdmin = new User();

        $passwordHashed = $this->hasher->hashPassword($superAdmin, "azerty1234A*");

        $superAdmin->setPrenom("Couronne");
        $superAdmin->setNom("Eclatante");
        $superAdmin->setEmail("couronneclatante@gmail.com");
        $superAdmin->setRoles(['ROLE_SUPER_ADMIN', 'ROLE_ADMIN', 'ROLE_USER']);
        $superAdmin->setPassword($passwordHashed);
        $superAdmin->setTelephone("0689765489");
        $superAdmin->setAdresseFacturation("Adresse à définir");
        $superAdmin->getVilleFacturation("Ville à définir");
        $superAdmin->getCodeFacturation("code postal à définir");

        return $superAdmin;
    }
}
