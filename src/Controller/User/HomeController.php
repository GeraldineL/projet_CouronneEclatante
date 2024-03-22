<?php
namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/* Ici je suis dans l'espace dédié à l'utilisateur qui est connecté en tant que client (User) */
#[Route('/user')]
class HomeController extends AbstractController
{
    #[Route('/home', name: 'user_home_index', methods:['GET'])]
    public function index(): Response
    {
        return $this->render('user/home/index.html.twig');
    }
}
