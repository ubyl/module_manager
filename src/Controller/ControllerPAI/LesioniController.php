<?php

namespace App\Controller\ControllerPAI;

use App\Entity\EntityPAI\Lesioni;
use App\Form\FormPAI\LesioniFormType;
use App\Repository\LesioniRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/lesioni')]
class LesioniController extends AbstractController
{
    #[Route('/', name: 'app_lesioni_index', methods: ['GET'])]
    public function index(LesioniRepository $lesioniRepository): Response
    {
        return $this->render('lesioni/index.html.twig', [
            'lesionis' => $lesioniRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_lesioni_new', methods: ['GET', 'POST'])]
    public function new(Request $request, LesioniRepository $lesioniRepository): Response
    {
        $lesioni = new Lesioni();
        $form = $this->createForm(LesioniFormType::class, $lesioni);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $lesioniRepository->add($lesioni, true);

            return $this->redirectToRoute('app_lesioni_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('lesioni/new.html.twig', [
            'lesioni' => $lesioni,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_lesioni_show', methods: ['GET'])]
    public function show(Lesioni $lesioni): Response
    {
        return $this->render('lesioni/show.html.twig', [
            'lesioni' => $lesioni,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_lesioni_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Lesioni $lesioni, LesioniRepository $lesioniRepository): Response
    {
        $form = $this->createForm(LesioniFormType::class, $lesioni);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $lesioniRepository->add($lesioni, true);

            return $this->redirectToRoute('app_lesioni_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('lesioni/edit.html.twig', [
            'lesioni' => $lesioni,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_lesioni_delete', methods: ['POST'])]
    public function delete(Request $request, Lesioni $lesioni, LesioniRepository $lesioniRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lesioni->getId(), $request->request->get('_token'))) {
            $lesioniRepository->remove($lesioni, true);
        }

        return $this->redirectToRoute('app_lesioni_index', [], Response::HTTP_SEE_OTHER);
    }
}
