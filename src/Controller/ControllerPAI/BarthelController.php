<?php

namespace App\Controller\ControllerPAI;

use App\Entity\EntityPAI\Barthel;
use App\Form\FormPAI\BarthelFormType;
use App\Repository\BarthelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/barthel')]
class BarthelController extends AbstractController
{
    #[Route('/', name: 'app_barthel_index', methods: ['GET'])]
    public function index(BarthelRepository $barthelRepository): Response
    {
        return $this->render('barthel/index.html.twig', [
            'barthels' => $barthelRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_barthel_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BarthelRepository $barthelRepository): Response
    {
        $barthel = new Barthel();
        $form = $this->createForm(BarthelFormType::class, $barthel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $barthelRepository->add($barthel, true);

            return $this->redirectToRoute('app_barthel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('barthel/new.html.twig', [
            'barthel' => $barthel,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_barthel_show', methods: ['GET'])]
    public function show(Barthel $barthel): Response
    {
        return $this->render('barthel/show.html.twig', [
            'barthel' => $barthel,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_barthel_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Barthel $barthel, BarthelRepository $barthelRepository): Response
    {
        $form = $this->createForm(BarthelFormType::class, $barthel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $barthelRepository->add($barthel, true);

            return $this->redirectToRoute('app_barthel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('barthel/edit.html.twig', [
            'barthel' => $barthel,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_barthel_delete', methods: ['POST'])]
    public function delete(Request $request, Barthel $barthel, BarthelRepository $barthelRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$barthel->getId(), $request->request->get('_token'))) {
            $barthelRepository->remove($barthel, true);
        }

        return $this->redirectToRoute('app_barthel_index', [], Response::HTTP_SEE_OTHER);
    }
}
