<?php

namespace App\Controller\ControllerPAI;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LesioniController extends AbstractController
{
    #[Route('/lesioni', name: 'app_lesioni')]
    public function index(): Response
    {
        return $this->render('lesioni/index.html.twig', [
            'controller_name' => 'LesioniController',
        ]);
    }
}
