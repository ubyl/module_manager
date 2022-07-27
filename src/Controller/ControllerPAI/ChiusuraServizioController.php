<?php

namespace App\Controller\ControllerPAI;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChiusuraServizioController extends AbstractController
{
    #[Route('/chiusura_servizio', name: 'app_chiusura_servizio')]
    public function index(): Response
    {
        return $this->render('chiusura_servizio/index.html.twig', [
            'controller_name' => 'ChiusuraServizioController',
        ]);
    }
}
