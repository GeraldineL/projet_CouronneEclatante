<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LivresNumeriquesController extends AbstractController
{
    #[Route('/livres/numeriques', name: 'app_livres_numeriques')]
    public function index(): Response
    {
        return $this->render('livres_numeriques/livres_numeriques.html.twig', [
            'controller_name' => 'LivresNumeriquesController',
        ]);
    }
}
