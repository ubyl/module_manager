<?php

namespace App\Controller\ControllerPAI;

use App\Entity\EntityPAI\Vas;
use App\Form\FormPAI\VasFormType;
use App\Repository\VasRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/vas')]
class VasController extends AbstractController
{
    #[Route('/', name: 'app_vas_index', methods: ['GET'])]
    public function index(VasRepository $vasRepository): Response
    {
        return $this->render('vas/index.html.twig', [
            'vas' => $vasRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_vas_new', methods: ['GET', 'POST'])]
    public function new(Request $request, VasRepository $vasRepository): Response
    {
        $va = new Vas();
        $form = $this->createForm(VasFormType::class, $va);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $vasRepository->add($va, true);

            return $this->redirectToRoute('app_vas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('vas/new.html.twig', [
            'va' => $va,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_vas_show', methods: ['GET'])]
    public function show(Vas $va): Response
    {
        return $this->render('vas/show.html.twig', [
            'va' => $va,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_vas_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Vas $va, VasRepository $vasRepository): Response
    {
        $form = $this->createForm(VasFormType::class, $va);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $vasRepository->add($va, true);

            return $this->redirectToRoute('app_vas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('vas/edit.html.twig', [
            'va' => $va,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_vas_delete', methods: ['POST'])]
    public function delete(Request $request, Vas $va, VasRepository $vasRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$va->getId(), $request->request->get('_token'))) {
            $vasRepository->remove($va, true);
        }

        return $this->redirectToRoute('app_vas_index', [], Response::HTTP_SEE_OTHER);
    }
}
