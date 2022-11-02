<?php

namespace App\Controller\ControllerPAI;

use App\Entity\EntityPAI\SchedaPAI;
use App\Entity\EntityPAI\ValutazioneGenerale;
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
        
        //controllo login
        $user= $this-> getUser();

       

        //parametri per calcolo tabella
        $ruoloUser = $user->getRoles();
        $idUser = $user->getId();
        //filtri
        $stato=$request->request->get('filtro_stato');
        $ordinamentoId = $request->request->get('filtro_id');
        $numeroSchedeVisibiliPerPagina= $request->request->get('filtro_numero_schede');
        
        
        //calcolo tabella
        $schedaPais= null;

        if($numeroSchedeVisibiliPerPagina == null)
        $schedePerPagina = 10;
        else
        $schedePerPagina = $numeroSchedeVisibiliPerPagina;

        $offset = $schedePerPagina*$page-$schedePerPagina;
        

        if($ruoloUser[0] == "ROLE_ADMIN"){
            if($stato != null){
                $schedaPais = $schedaPAIRepository->selectStatoSchedePai($stato, $ordinamentoId, $page, $schedePerPagina);
            }
            else{
                if($ordinamentoId == null || $ordinamentoId == "" || $ordinamentoId == 'Crescente'){
                    $schedaPais= $schedaPAIRepository->findBy([], array('id' => 'ASC'), $schedePerPagina, $offset );
                }
                else if($ordinamentoId == 'Decrescente'){
                    $schedaPais= $schedaPAIRepository->findBy([], array('id' => 'DESC'), $schedePerPagina, $offset );
                }
            }
        }
        else if($ruoloUser[0] == "ROLE_USER"){
            if($stato == null || $stato == ""){
                $schedaPais= $schedaPAIRepository->findUserSchedePai($idUser, null, $ordinamentoId, $schedePerPagina, $page);  
            }
            else{
                $schedaPais= $schedaPAIRepository->findUserSchedePai($idUser, $stato, $ordinamentoId, $schedePerPagina, $page);  
            }
        }
        //calcolo pagine per paginatore
        $totaleSchede = $schedaPAIRepository->contaSchedePai($ruoloUser[0], $idUser, $stato);
        $pagineTotali = ceil($totaleSchede/$schedePerPagina);

        if($pagineTotali == 0)
            $pagineTotali = 1;
        return $this->render('scheda_pai/index.html.twig', [
            'scheda_pais' => $schedaPais,
            'pagina'=>$page,
            'pagine_totali'=>$pagineTotali,
            'schede_per_pagina' => $schedePerPagina,
            'ordinamento' => $ordinamentoId,
            'stato' => $stato,
            'user' => $user]);
    
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
        $valutazioneGenerale = $schedaPAI->getIdValutazioneGenerale();
        $valutazioniFiguraProfessionale = $schedaPAI ->getIdValutazioneFiguraProfessionale();
        $parereMMG = $schedaPAI->getIdParereMmg();
        $barthel = $schedaPAI->getIdBarthel();
        $braden = $schedaPAI->getIdBraden();
        $spmsq = $schedaPAI->getIdSpmsq();
        $tinetti = $schedaPAI->getIdTinetti();
        $vas = $schedaPAI->getIdVas();
        $lesioni = $schedaPAI->getIdLesioni();
        $chiusuraServizio = $schedaPAI->getIdChiusuraServizio();
        $variabileTest = 1;
        return $this->render('scheda_pai_completa.html.twig', [
            'scheda_pai' => $schedaPAI,
            'valutazione_generale' => $valutazioneGenerale,
            'valutazioni_figura_professionale' => $valutazioniFiguraProfessionale,
            'parere_mmg' => $parereMMG,
            'barthels' => $barthel,
            'bradens' => $braden,
            'spmsqs' => $spmsq,
            'tinettis' => $tinetti,
            'vass' => $vas,
            'lesionis' => $lesioni,
            'chiusura_servizio' =>$chiusuraServizio,
            'variabileTest' => $variabileTest
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

    #[Route('/delete/{id}', name: 'app_scheda_pai_delete', methods: ['GET','POST'])]
    public function delete(Request $request, SchedaPAI $schedaPAI, SchedaPAIRepository $schedaPAIRepository): Response
    {
        
        if ($this->isCsrfTokenValid('delete'.$schedaPAI->getId(), $request->get('_token'))) {
            $schedaPAIRepository->remove($schedaPAI, true);
        }

        return $this->redirectToRoute('app_scheda_pai_index', [], Response::HTTP_SEE_OTHER);
    }
}
