<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ElencoSchedeController extends AbstractController
{
    #[Route('/elenco_schede', name: 'app_elenco_schede')]
    public function index(): Response
    {
        $user= $this-> getUser();

        
        return $this->render('elenco_schede/index.html.twig', [
            'controller_name' => 'ElencoSchedeController',
            'user' => $user,
            
        ]);
    }
}
