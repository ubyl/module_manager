<?php

namespace App\Controller\ControllerPAI;

use Doctrine\Persistence\ManagerRegistry;
use App\Entity\EntityPAI\ChiusuraServizio;
use Symfony\Component\HttpFoundation\Request;
use App\Form\FormPAI\ChiusuraServizioFormType;
use App\Repository\ChiusuraServizioRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/chiusura_servizio')]
class ChiusuraServizioController extends AbstractController
{
    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
        $this->entityManager = $this->managerRegistry->getManager();
    }
    #[Route('/', name: 'app_chiusura_servizio_index', methods: ['GET'])]
    public function index(ChiusuraServizioRepository $chiusuraServizioRepository): Response
    {
        return $this->render('chiusura_servizio/index.html.twig', [
            'chiusura_servizios' => $chiusuraServizioRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_chiusura_servizio_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $chiusuraServizio = new ChiusuraServizio();
        $form = $this->createForm(ChiusuraServizioFormType::class, $chiusuraServizio);
        $form->handleRequest($request);
        $id_pai = $request->query->get('id_pai');
        $SchedaPAIRepository = $this->entityManager->getRepository(SchedaPAI::class);
        $schedaPai = $SchedaPAIRepository->find($id_pai);
        if (!$schedaPai) {
            return $this->redirectToRoute('app_scheda_pai_index', [], Response::HTTP_SEE_OTHER);
        }
        if ($form->isSubmitted() && $form->isValid()) {
            $schedaPai->setIdChiusuraServizio($chiusuraServizio);
            $chiusuraServizioRepository = $this->entityManager->getRepository(ChiusuraServizio::class);
            $chiusuraServizioRepository->add($chiusuraServizio, true);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_scheda_pai_index', [], Response::HTTP_SEE_OTHER);
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
