<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TinettiController extends AbstractController
{
    #[Route('/tinetti', name: 'app_tinetti')]
    public function index(): Response
    {
        return $this->render('tinetti/index.html.twig', [
            'controller_name' => 'TinettiController',
        ]);
    }
}
