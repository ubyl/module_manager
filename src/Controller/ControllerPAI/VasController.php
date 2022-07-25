<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VasController extends AbstractController
{
    #[Route('/vas', name: 'app_vas')]
    public function index(): Response
    {
        return $this->render('vas/index.html.twig', [
            'controller_name' => 'VasController',
        ]);
    }
}
