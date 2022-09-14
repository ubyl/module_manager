<?php

namespace App\Controller\ControllerPAI;

use App\Entity\EntityPAI\SchedaPAI;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\EntityPAI\ValutazioneFiguraProfessionale;
use App\Form\FormPAI\ValutazioneFiguraProfessionaleFormType;
use App\Repository\ValutazioneFiguraProfessionaleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/valutazione_figura_professionale')]
class ValutazioneFiguraProfessionaleController extends AbstractController
{
    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
        $this->entityManager = $this->managerRegistry->getManager();
    }
    #[Route('/', name: 'app_valutazione_figura_professionale_index', methods: ['GET'])]
    public function index(ValutazioneFiguraProfessionaleRepository $valutazioneFiguraProfessionaleRepository): Response
    {
        return $this->render('valutazione_figura_professionale/index.html.twig', [
            'valutazione_figura_professionales' => $valutazioneFiguraProfessionaleRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_valutazione_figura_professionale_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $valutazioneFiguraProfessionale = new ValutazioneFiguraProfessionale();
        $form = $this->createForm(ValutazioneFiguraProfessionaleFormType::class, $valutazioneFiguraProfessionale);
        $form->handleRequest($request);
        $id_pai = $request->query->get('id_pai');
        $SchedaPAIRepository = $this->entityManager->getRepository(SchedaPAI::class);
        $schedaPai = $SchedaPAIRepository->find($id_pai);
        if (!$schedaPai) {
            return $this->redirectToRoute('app_scheda_pai_index', [], Response::HTTP_SEE_OTHER);
        }
        if ($form->isSubmitted() && $form->isValid()) {
            $schedaPai->addIdValutazioneFiguraProfessionale($valutazioneFiguraProfessionale);
            $valutazioneFiguraProfessionaleRepository = $this->entityManager->getRepository(ValutazioneFiguraProfessionale::class);
            $valutazioneFiguraProfessionaleRepository->add($valutazioneFiguraProfessionale, true);
            $this->entityManager->flush();

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
