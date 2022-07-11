<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaginaTestController extends AbstractController
{
    #[Route('/homepage', name: 'app_pagina_test')]
    public function index(): Response
    {
        return $this->render('pagina_test/index.html.twig', [
            'controller_name' => 'PaginaTestController',
        ]);
    }
}
