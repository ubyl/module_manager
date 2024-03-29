<?php

namespace App\Controller\ControllerPAI;

use App\Entity\EntityPAI\Braden;
use App\Entity\EntityPAI\SchedaPAI;
use App\Form\FormPAI\BradenFormType;
use App\Repository\BradenRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/braden')]
class BradenController extends AbstractController
{
    private $entityManager;
    private $managerRegistry;

    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
        $this->entityManager = $this->managerRegistry->getManager();
    }
    #[Route('/{page}', name: 'app_form_pai_braden_index',requirements: ['page' => '\d+'], methods: ['GET'])]
    public function index(BradenRepository $bradenRepository, int $page=1): Response
    {
        $schedePerPagina = 10;
        $offset = $schedePerPagina*$page-$schedePerPagina;
        $totaleSchede = $bradenRepository->contaSchede();
        $pagineTotali = ceil($totaleSchede/$schedePerPagina);
        return $this->render('braden/index.html.twig', [
            'bradens' => $bradenRepository->findBy([], null, $schedePerPagina, $offset ),
            'pagina'=>$page,
            'pagine_totali'=>$pagineTotali
        ]);
    }

    #[Route('/new', name: 'app_form_pai_braden_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $braden = new Braden();
        $form = $this->createForm(BradenFormType::class, $braden);
        $form->handleRequest($request);
        $id_pai = $request->query->get('id_pai');
        $SchedaPAIRepository = $this->entityManager->getRepository(SchedaPAI::class);
        $schedaPai = $SchedaPAIRepository->find($id_pai);
        if (!$schedaPai) {
            return $this->redirectToRoute('app_scheda_pai_index', [], Response::HTTP_SEE_OTHER);
        }
        if ($form->isSubmitted() && $form->isValid()) {
            $schedaPai->addIdBraden($braden);
            $bradenRepository = $this->entityManager->getRepository(Braden::class);
            $bradenRepository->add($braden, true);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_form_pai_braden_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('braden/new.html.twig', [
            'braden' => $braden,
            'form' => $form,
        ]);
    }

    #[Route('/show/{id}', name: 'app_form_pai_braden_show', methods: ['GET'])]
    public function show(Braden $braden): Response
    {
        $variabileTest = null;
        return $this->render('braden/show.html.twig', [
            'braden' => $braden,
            'variabileTest' => $variabileTest
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
