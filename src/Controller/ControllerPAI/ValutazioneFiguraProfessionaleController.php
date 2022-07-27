<?php

namespace App\Controller\ControllerPAI;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ValutazioneFiguraProfessionaleController extends AbstractController
{
    #[Route('/valutazione_figura_professionale', name: 'app_valutazione_figura_professionale')]
    public function index(): Response
    {
        return $this->render('valutazione_figura_professionale/index.html.twig', [
            'controller_name' => 'ValutazioneFiguraProfessionaleController',
        ]);
    }
}
