<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProgrammeCouronneEclatanteController extends AbstractController
{
    #[Route('/programme/couronne/eclatante', name: 'app_programme_couronne_eclatante')]
    public function index(): Response
    {
        return $this->render('programme_couronne_eclatante/programme_couronne.html.twig', [
            'controller_name' => 'ProgrammeCouronneEclatanteController',
        ]);
    }
}
