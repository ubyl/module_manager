<?php

namespace App\Controller\ControllerPAI;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BarthelController extends AbstractController
{
    #[Route('/barthel', name: 'app_barthel')]
    public function index(): Response
    {
        return $this->render('barthel/index.html.twig', [
            'controller_name' => 'BarthelController',
        ]);
    }
}
