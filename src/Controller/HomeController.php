<?php

/* Controller qui gère la page d'accueil et qui s'appelle HomeController */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')] /* la route s'appelle 'home' */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [] );
           /* ['controller_name' => 'NomDuController'], */ 
        
    }
}
