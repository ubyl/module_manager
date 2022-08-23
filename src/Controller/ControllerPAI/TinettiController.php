<?php

namespace App\Controller\ControllerPAI;

use App\Entity\EntityPAI\Tinetti;
use App\Form\FormPAI\TinettiFormType;
use App\Repository\TinettiRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/tinetti')]
class TinettiController extends AbstractController
{
    #[Route('/', name: 'app_tinetti_index', methods: ['GET'])]
    public function index(TinettiRepository $tinettiRepository): Response
    {
        return $this->render('tinetti/index.html.twig', [
            'tinettis' => $tinettiRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_tinetti_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TinettiRepository $tinettiRepository): Response
    {
        $tinetti = new Tinetti();
        $form = $this->createForm(TinettiFormType::class, $tinetti);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tinettiRepository->add($tinetti, true);

            return $this->redirectToRoute('app_tinetti_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tinetti/new.html.twig', [
            'tinetti' => $tinetti,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tinetti_show', methods: ['GET'])]
    public function show(Tinetti $tinetti): Response
    {
        return $this->render('tinetti/show.html.twig', [
            'tinetti' => $tinetti,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_tinetti_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Tinetti $tinetti, TinettiRepository $tinettiRepository): Response
    {
        $form = $this->createForm(TinettiFormType::class, $tinetti);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tinettiRepository->add($tinetti, true);

            return $this->redirectToRoute('app_tinetti_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tinetti/edit.html.twig', [
            'tinetti' => $tinetti,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_tinetti_delete', methods: ['POST'])]
    public function delete(Request $request, Tinetti $tinetti, TinettiRepository $tinettiRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tinetti->getId(), $request->request->get('_token'))) {
            $tinettiRepository->remove($tinetti, true);
        }

        return $this->redirectToRoute('app_tinetti_index', [], Response::HTTP_SEE_OTHER);
    }
}
