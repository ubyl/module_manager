<?php

namespace App\Controller\ControllerPAI;

use App\Entity\EntityPAI\Braden;
use App\Form\FormPAI\BradenType;
use App\Repository\BradenRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/braden')]
class BradenController extends AbstractController
{
    #[Route('/', name: 'app_form_pai_braden_index', methods: ['GET'])]
    public function index(BradenRepository $bradenRepository): Response
    {
        return $this->render('braden/index.html.twig', [
            'bradens' => $bradenRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_form_pai_braden_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BradenRepository $bradenRepository): Response
    {
        $braden = new Braden();
        $form = $this->createForm(BradenFormType::class, $braden);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bradenRepository->add($braden, true);

            return $this->redirectToRoute('app_form_pai_braden_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('braden/new.html.twig', [
            'braden' => $braden,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_form_pai_braden_show', methods: ['GET'])]
    public function show(Braden $braden): Response
    {
        return $this->render('braden/show.html.twig', [
            'braden' => $braden,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_form_pai_braden_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Braden $braden, BradenRepository $bradenRepository): Response
    {
        $form = $this->createForm(BradenFormType::class, $braden);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bradenRepository->add($braden, true);

            return $this->redirectToRoute('app_form_pai_braden_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('braden/edit.html.twig', [
            'braden' => $braden,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_form_pai_braden_delete', methods: ['POST'])]
    public function delete(Request $request, Braden $braden, BradenRepository $bradenRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$braden->getId(), $request->request->get('_token'))) {
            $bradenRepository->remove($braden, true);
        }

        return $this->redirectToRoute('app_form_pai_braden_index', [], Response::HTTP_SEE_OTHER);
    }
}
