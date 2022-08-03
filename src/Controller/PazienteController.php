<?php

namespace App\Controller;

use App\Entity\Paziente;
use App\Form\PazienteType;
use App\Repository\PazienteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/paziente')]
class PazienteController extends AbstractController
{
    #[Route('/', name: 'app_paziente_index', methods: ['GET'])]
    public function index(PazienteRepository $pazienteRepository): Response
    {
        return $this->render('paziente/index.html.twig', [
            'pazientes' => $pazienteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_paziente_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PazienteRepository $pazienteRepository): Response
    {
        $paziente = new Paziente();
        $form = $this->createForm(PazienteType::class, $paziente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pazienteRepository->add($paziente, true);

            return $this->redirectToRoute('app_paziente_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('paziente/new.html.twig', [
            'paziente' => $paziente,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_paziente_show', methods: ['GET'])]
    public function show(Paziente $paziente): Response
    {
        return $this->render('paziente/show.html.twig', [
            'paziente' => $paziente,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_paziente_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Paziente $paziente, PazienteRepository $pazienteRepository): Response
    {
        $form = $this->createForm(PazienteType::class, $paziente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pazienteRepository->add($paziente, true);

            return $this->redirectToRoute('app_paziente_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('paziente/edit.html.twig', [
            'paziente' => $paziente,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_paziente_delete', methods: ['POST'])]
    public function delete(Request $request, Paziente $paziente, PazienteRepository $pazienteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$paziente->getId(), $request->request->get('_token'))) {
            $pazienteRepository->remove($paziente, true);
        }

        return $this->redirectToRoute('app_paziente_index', [], Response::HTTP_SEE_OTHER);
    }
}
