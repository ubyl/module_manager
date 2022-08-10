<?php

namespace App\Controller\ControllerPAI;

use App\Entity\EntityPAI\ValutazioneFiguraProfessionale;
use App\Form\FormPAI\ValutazioneFiguraProfessionaleFormType;
use App\Repository\ValutazioneFiguraProfessionaleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/valutazione_figura_professionale')]
class ValutazioneFiguraProfessionaleController extends AbstractController
{
    #[Route('/', name: 'app_valutazione_figura_professionale_index', methods: ['GET'])]
    public function index(ValutazioneFiguraProfessionaleRepository $valutazioneFiguraProfessionaleRepository): Response
    {
        return $this->render('valutazione_figura_professionale/index.html.twig', [
            'valutazione_figura_professionales' => $valutazioneFiguraProfessionaleRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_valutazione_figura_professionale_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ValutazioneFiguraProfessionaleRepository $valutazioneFiguraProfessionaleRepository): Response
    {
        $valutazioneFiguraProfessionale = new ValutazioneFiguraProfessionale();
        $form = $this->createForm(ValutazioneFiguraProfessionaleFormType::class, $valutazioneFiguraProfessionale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $valutazioneFiguraProfessionaleRepository->add($valutazioneFiguraProfessionale, true);

            return $this->redirectToRoute('app_valutazione_figura_professionale_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('valutazione_figura_professionale/new.html.twig', [
            'valutazione_figura_professionale' => $valutazioneFiguraProfessionale,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_valutazione_figura_professionale_show', methods: ['GET'])]
    public function show(ValutazioneFiguraProfessionale $valutazioneFiguraProfessionale): Response
    {
        return $this->render('valutazione_figura_professionale/show.html.twig', [
            'valutazione_figura_professionale' => $valutazioneFiguraProfessionale,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_valutazione_figura_professionale_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ValutazioneFiguraProfessionale $valutazioneFiguraProfessionale, ValutazioneFiguraProfessionaleRepository $valutazioneFiguraProfessionaleRepository): Response
    {
        $form = $this->createForm(ValutazioneFiguraProfessionaleFormType::class, $valutazioneFiguraProfessionale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $valutazioneFiguraProfessionaleRepository->add($valutazioneFiguraProfessionale, true);

            return $this->redirectToRoute('app_valutazione_figura_professionale_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('valutazione_figura_professionale/edit.html.twig', [
            'valutazione_figura_professionale' => $valutazioneFiguraProfessionale,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_valutazione_figura_professionale_delete', methods: ['POST'])]
    public function delete(Request $request, ValutazioneFiguraProfessionale $valutazioneFiguraProfessionale, ValutazioneFiguraProfessionaleRepository $valutazioneFiguraProfessionaleRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$valutazioneFiguraProfessionale->getId(), $request->request->get('_token'))) {
            $valutazioneFiguraProfessionaleRepository->remove($valutazioneFiguraProfessionale, true);
        }

        return $this->redirectToRoute('app_valutazione_figura_professionale_index', [], Response::HTTP_SEE_OTHER);
    }
}
