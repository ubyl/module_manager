<?php

namespace App\Controller\ControllerPAI;

use App\Entity\EntityPAI\SchedaPAI;
use App\Form\FormPAI\SchedaPAIType;
use App\Repository\SchedaPAIRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Workflow\WorkflowInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


#[Route('/scheda_pai')]
class SchedaPAIController extends AbstractController
{
    private $workflow;

    public function __construct(WorkflowInterface $schedePaiCreatingStateMachine)
    {
        $this->workflow = $schedePaiCreatingStateMachine;
    }

    #[Route('/{page}', name: 'app_scheda_pai_index',requirements: ['page' => '\d+'], methods: ['GET', 'POST'])]
    public function index(Request $request, SchedaPAIRepository $schedaPAIRepository, int $page=1): Response
    {
        $schedePerPagina = 10;
        $offset = $schedePerPagina*$page-$schedePerPagina;
        $totaleSchede = $schedaPAIRepository->contaSchedePai();
        $pagineTotali = ceil($totaleSchede/$schedePerPagina);
        $schedaPais= null;

        //filtri
        $stato=$request->request->get('filtro_stato');
        
        $user= $this-> getUser();

        if($user == null){
            return $this->redirectToRoute('app_login', [], Response::HTTP_SEE_OTHER);
        }
        $ruoloUser = $user->getRoles();
        $idUser = $user->getId();

        if($ruoloUser[0] == "ROLE_ADMIN"){
            if($stato != null)
            $schedaPais = $schedaPAIRepository->selectStatoSchedePai($stato);
            else
            $schedaPais= $schedaPAIRepository->findBy([], null, $schedePerPagina, $offset );
        }
        if($ruoloUser[0] == "ROLE_USER"){
            $schedaPais= $schedaPAIRepository->findUserSchedePai($idUser);      
        }
        return $this->render('scheda_pai/index.html.twig', [
            'scheda_pais' => $schedaPais,
            'pagina'=>$page,
            'pagine_totali'=>$pagineTotali]);

    }




    #[Route('/new', name: 'app_scheda_pai_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SchedaPAIRepository $schedaPAIRepository): Response
    {
        $schedaPAI = new SchedaPAI();
        $form = $this->createForm(SchedaPAIType::class, $schedaPAI);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $schedaPAI->setCurrentPlace('nuova');
            if($this->workflow->can($schedaPAI, 'approva')){
                $this->workflow->apply($schedaPAI, 'approva');
            }
            $schedaPAIRepository->add($schedaPAI, true);
            return $this->redirectToRoute('app_scheda_pai_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('scheda_pai/new.html.twig', [
            'scheda_pai' => $schedaPAI,
            'form' => $form,
        ]);
    }

    #[Route('/show/{id}', name: 'app_scheda_pai_show', methods: ['GET'])]
    public function show(SchedaPAI $schedaPAI): Response
    {
        return $this->render('scheda_pai/show.html.twig', [
            'scheda_pai' => $schedaPAI,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_scheda_pai_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, SchedaPAI $schedaPAI, SchedaPAIRepository $schedaPAIRepository): Response
    {
        $form = $this->createForm(SchedaPAIType::class, $schedaPAI);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $schedaPAIRepository->add($schedaPAI, true);

            return $this->redirectToRoute('app_scheda_pai_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('scheda_pai/edit.html.twig', [
            'scheda_pai' => $schedaPAI,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_scheda_pai_delete', methods: ['POST'])]
    public function delete(Request $request, SchedaPAI $schedaPAI, SchedaPAIRepository $schedaPAIRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$schedaPAI->getId(), $request->request->get('_token'))) {
            $schedaPAIRepository->remove($schedaPAI, true);
        }

        return $this->redirectToRoute('app_scheda_pai_index', [], Response::HTTP_SEE_OTHER);
    }
}
