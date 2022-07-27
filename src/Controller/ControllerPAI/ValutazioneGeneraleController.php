<?php

namespace App\Controller\ControllerPAI;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ValutazioneGeneraleController extends AbstractController
{
    #[Route('/valutazione_generale', name: 'app_valutazione_generale')]
    public function index(): Response
    {
        return $this->render('valutazione_generale/index.html.twig', [
            'controller_name' => 'ValutazioneGeneraleController',
        ]);
    }
}
