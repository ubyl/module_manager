<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SPMSQController extends AbstractController
{
    #[Route('/spmsq', name: 'app_spmsq')]
    public function index(): Response
    {
        return $this->render('spmsq/index.html.twig', [
            'controller_name' => 'SPMSQController',
        ]);
    }
}
