<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register', methods: ['GET', 'POST'])] /* Méthode GET pour accéder au formulaire et méthode POST pour traiter les données du formulaire */
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {

        if ($this->getUser()) {
            return $this->redirectToRoute('home');/* si l'utilisateur qui est déjà connecté essaie de se reconnecter on le redirige vers page d'accueil 'home' */
        }
        
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        /* On associe les données du formulaire au formulaire */
        $form->handleRequest($request);

        /* Si le formulaire est soumis et si le formulaire est valide */
        if ($form->isSubmitted() && $form->isValid()) {

            /* On pourra entrer dans la condition et effectuer des actions */
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('password')->getData() 
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();
            // Ici,on peut traiter les données du formuaire par exemple envoyer un email

        // Traiter les données du formulaire, par exemple, j'enregistre l'utilisateur dans la base de données

        return $this->redirectToRoute('app_login');
    }

       /* Pour avoir la vue du formulaire */
       return $this->render('registration/register.html.twig', [
        'registrationForm' => $form->createView(),
    ]);
}
}         

          #  return $this->redirectToRoute('_profiler_home');
        
   

