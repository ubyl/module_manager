<?php

namespace App\Controller\ControllerPAI;

use App\Entity\EntityPAI\ChiusuraServizio;
use App\Form\FormPAI\ChiusuraServizioFormType;
use App\Repository\ChiusuraServizioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/chiusura_servizio')]
class ChiusuraServizioController extends AbstractController
{
    #[Route('/', name: 'app_chiusura_servizio_index', methods: ['GET'])]
    public function index(ChiusuraServizioRepository $chiusuraServizioRepository): Response
    {
        return $this->render('chiusura_servizio/index.html.twig', [
            'chiusura_servizios' => $chiusuraServizioRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_chiusura_servizio_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ChiusuraServizioRepository $chiusuraServizioRepository): Response
    {
        $chiusuraServizio = new ChiusuraServizio();
        $form = $this->createForm(ChiusuraServizioFormType::class, $chiusuraServizio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $chiusuraServizioRepository->add($chiusuraServizio, true);

            return $this->redirectToRoute('app_chiusura_servizio_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('chiusura_servizio/new.html.twig', [
            'chiusura_servizio' => $chiusuraServizio,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_chiusura_servizio_show', methods: ['GET'])]
    public function show(ChiusuraServizio $chiusuraServizio): Response
    {
        return $this->render('chiusura_servizio/show.html.twig', [
            'chiusura_servizio' => $chiusuraServizio,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_chiusura_servizio_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ChiusuraServizio $chiusuraServizio, ChiusuraServizioRepository $chiusuraServizioRepository): Response
    {
        $form = $this->createForm(ChiusuraServizioFormType::class, $chiusuraServizio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $chiusuraServizioRepository->add($chiusuraServizio, true);

            return $this->redirectToRoute('app_chiusura_servizio_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('chiusura_servizio/edit.html.twig', [
            'chiusura_servizio' => $chiusuraServizio,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_chiusura_servizio_delete', methods: ['POST'])]
    public function delete(Request $request, ChiusuraServizio $chiusuraServizio, ChiusuraServizioRepository $chiusuraServizioRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$chiusuraServizio->getId(), $request->request->get('_token'))) {
            $chiusuraServizioRepository->remove($chiusuraServizio, true);
        }

        return $this->redirectToRoute('app_chiusura_servizio_index', [], Response::HTTP_SEE_OTHER);
    }
}
