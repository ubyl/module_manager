<?php

namespace App\Controller\ControllerPAI;

use App\Entity\EntityPAI\ValutazioneGenerale;
use App\Form\FormPAI\ValutazioneGeneraleFormType;
use App\Repository\ValutazioneGeneraleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/valutazione_generale')]
class ValutazioneGeneraleController extends AbstractController
{
    #[Route('/', name: 'app_valutazione_generale_index', methods: ['GET'])]
    public function index(ValutazioneGeneraleRepository $valutazioneGeneraleRepository): Response
    {
        return $this->render('valutazione_generale/index.html.twig', [
            'valutazione_generales' => $valutazioneGeneraleRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_valutazione_generale_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ValutazioneGeneraleRepository $valutazioneGeneraleRepository): Response
    {
        $valutazioneGenerale = new ValutazioneGenerale();
        $form = $this->createForm(ValutazioneGeneraleFormType::class, $valutazioneGenerale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $valutazioneGeneraleRepository->add($valutazioneGenerale, true);

            return $this->redirectToRoute('app_valutazione_generale_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('valutazione_generale/new.html.twig', [
            'valutazione_generale' => $valutazioneGenerale,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_valutazione_generale_show', methods: ['GET'])]
    public function show(ValutazioneGenerale $valutazioneGenerale): Response
    {
        return $this->render('valutazione_generale/show.html.twig', [
            'valutazione_generale' => $valutazioneGenerale,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_valutazione_generale_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ValutazioneGenerale $valutazioneGenerale, ValutazioneGeneraleRepository $valutazioneGeneraleRepository): Response
    {
        $form = $this->createForm(ValutazioneGeneraleFormType::class, $valutazioneGenerale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $valutazioneGeneraleRepository->add($valutazioneGenerale, true);

            return $this->redirectToRoute('app_valutazione_generale_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('valutazione_generale/edit.html.twig', [
            'valutazione_generale' => $valutazioneGenerale,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_valutazione_generale_delete', methods: ['POST'])]
    public function delete(Request $request, ValutazioneGenerale $valutazioneGenerale, ValutazioneGeneraleRepository $valutazioneGeneraleRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$valutazioneGenerale->getId(), $request->request->get('_token'))) {
            $valutazioneGeneraleRepository->remove($valutazioneGenerale, true);
        }

        return $this->redirectToRoute('app_valutazione_generale_index', [], Response::HTTP_SEE_OTHER);
    }
}
