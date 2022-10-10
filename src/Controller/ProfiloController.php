<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfiloController extends AbstractController
{
    #[Route('/profilo', name: 'app_profilo')]
    public function index(): Response
    {
        return $this->render('Profilo/index.html.twig', [
            'controller_name' => 'ProfiloController',
        ]);
    }
}