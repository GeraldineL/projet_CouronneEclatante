<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DevenirMembreController extends AbstractController
{
    #[Route('/devenir/membre', name: 'app_devenir_membre')]
    public function index(): Response
    {
        return $this->render('registration/register.html.twig', [
            'controller_name' => 'DevenirMembreController',
        ]);
    }
}
