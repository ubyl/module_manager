<?php

namespace App\Controller\ControllerPAI;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BradenController extends AbstractController
{
    #[Route('/braden', name: 'app_braden')]
    public function index(): Response
    {
        return $this->render('braden/index.html.twig', [
            'controller_name' => 'BradenController',
        ]);
    }
}
