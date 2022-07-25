<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ParereMMGController extends AbstractController
{
    #[Route('/parere_mmg', name: 'app_parere_mmg')]
    public function index(): Response
    {
        return $this->render('parere_mmg/index.html.twig', [
            'controller_name' => 'ParereMMGController',
        ]);
    }
}
