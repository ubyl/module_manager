<?php

namespace App\Service;

use Symfony\Component\Mime\Email;
use App\Entity\EntityPAI\SchedaPAI;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\MailerInterface;

class MailerGenerator
{
    private $mailer;
    private $entityManager;

    public function __construct(MailerInterface $mailer, EntityManagerInterface $entityManager)
    {
        $this->mailer = $mailer;
        $this->entityManager = $entityManager;
    }


    public function EmailAdmin()
    {
        $em = $this->entityManager;
        $schedaPAIRepository = $em->getRepository(SchedaPAI::class);
        $numeroSchedeNuove = $schedaPAIRepository->findOneByState('nuova');
        $numeroSchedeChiuse = $schedaPAIRepository->findOneByState('chiusa');
        $numeroSchedeChiuseConRinnovo = $schedaPAIRepository->findOneByState('chiusa_con_rinnovo');

        if ($numeroSchedeNuove != null && $numeroSchedeChiuse == null && $numeroSchedeChiuseConRinnovo == null) {
            $email = (new Email())
                ->from('tecnico@metarete.it')
                ->to('admin@live.it')
                ->subject('Schede nello stato Nuova')
                ->text('Esiste almeno una scheda nello stato Nuova che deve essere approvata');

            $this->mailer->send($email);
        }
        if ($numeroSchedeNuove != null && $numeroSchedeChiuse != null && $numeroSchedeChiuseConRinnovo == null){
            $email = (new Email())
                ->from('tecnico@metarete.it')
                ->to('admin@live.it')
                ->subject('Schede nello stato Nuova')
                ->text('Esiste almeno una scheda nello stato Nuova che deve essere approvata e una scheda che è stata chiusa.');

            $this->mailer->send($email);
        }
        if ($numeroSchedeNuove != null && $numeroSchedeChiuse != null && $numeroSchedeChiuseConRinnovo != null){
            $email = (new Email())
                ->from('tecnico@metarete.it')
                ->to('admin@live.it')
                ->subject('Schede nello stato Nuova')
                ->text('Esiste almeno una scheda nello stato Nuova che deve essere approvata e una scheda che è stata chiusa.
                Esiste anche una scheda chiusa che necessita di un rinnovo: occorre attivarsi per creare un nuovo Progetto in SD Manager.');

            $this->mailer->send($email);
        }
        if ($numeroSchedeNuove == null && $numeroSchedeChiuse != null && $numeroSchedeChiuseConRinnovo != null){
            $email = (new Email())
                ->from('tecnico@metarete.it')
                ->to('admin@live.it')
                ->subject('Schede nello stato Nuova')
                ->text('Esiste almeno  una scheda che è stata chiusa.Esiste anche una scheda chiusa che necessita di un rinnovo: occorre attivarsi per creare un nuovo Progetto in SD Manager.');

            $this->mailer->send($email);
        }
        if ($numeroSchedeNuove == null && $numeroSchedeChiuse == null && $numeroSchedeChiuseConRinnovo != null){
            $email = (new Email())
            ->from('tecnico@metarete.it')
            ->to('admin@live.it')
            ->subject('Schede nello stato Nuova')
            ->text('Esiste una scheda chiusa che necessita di un rinnovo: occorre attivarsi per creare un nuovo Progetto in SD Manager.');

        $this->mailer->send($email);
        
        }
        if ($numeroSchedeNuove == null && $numeroSchedeChiuse != null && $numeroSchedeChiuseConRinnovo == null){
            $email = (new Email())
            ->from('tecnico@metarete.it')
            ->to('admin@live.it')
            ->subject('Schede nello stato Nuova')
            ->text('Esiste almeno  una scheda che è stata chiusa.');

        $this->mailer->send($email);
        
        }
        if ($numeroSchedeNuove != null && $numeroSchedeChiuse == null && $numeroSchedeChiuseConRinnovo != null){
            $email = (new Email())
                ->from('tecnico@metarete.it')
                ->to('admin@live.it')
                ->subject('Schede nello stato Nuova')
                ->text('Esiste almeno una scheda nello stato Nuova che deve essere approvata.
                Esiste anche una scheda chiusa che necessita di un rinnovo: occorre attivarsi per creare un nuovo Progetto in SD Manager.');

            $this->mailer->send($email);
        }
    }

    public function EmailOperatorePrincipale()
    {
        $em = $this->entityManager;
        $schedaPAIRepository = $em->getRepository(SchedaPAI::class);
        $userRepository = $em->getRepository(User::class);
        $arraySchedeApprovate = $schedaPAIRepository->findByState('approvata');
        $arraySchedeAttive = $schedaPAIRepository->findByState('attiva');
        $arraySchedeInAttesaDiChiusura = $schedaPAIRepository->findByState('in_attesa_di_chiusura');
        $arrayOperatoriGiaAvvisati = [];
        for ($i = 0; $i < count($arraySchedeApprovate); $i++) {

            $idOperatore = $arraySchedeApprovate[$i]->getIdOperatorePrincipale();
            $mail = $userRepository->findEmailById($idOperatore);
            $stringaMail = $mail[0];
            $stringaMail = implode(", ", $stringaMail);
            if (in_array($stringaMail, $arrayOperatoriGiaAvvisati)) {
                //ho già mandato la mail una volta all'operatore. Non intasiamo la mail 
            } else {
                
                $email = (new Email())
                    ->from('tecnico@metarete.it')
                    ->to($stringaMail)
                    ->subject('Schede in stato approvata')
                    ->text('Esiste almeno una scheda in stato approvata in cui sei operatore principale che deve essere attivata. 
                    Abilitare le scale, impostare la frequenza di compilazione e compilare la valutazione generale.');

                $this->mailer->send($email);
                array_push($arrayOperatoriGiaAvvisati, $stringaMail);
            }
        }
    }

    public function EmailOperatoreSecondario()
    {
        $em = $this->entityManager;
        $schedaPAIRepository = $em->getRepository(SchedaPAI::class);
        $userRepository = $em->getRepository(User::class);
        $arraySchedeApprovate = $schedaPAIRepository->findByState('attiva');
        $arrayOperatoriGiaAvvisati = [];

        for ($i = 0; $i < count($arraySchedeApprovate); $i++) {
            $arrayIdOperatoriInf = $arraySchedeApprovate[$i]->getIdOperatoreSecondarioInf();
            $arrayIdOperatoriTdr = $arraySchedeApprovate[$i]->getIdOperatoreSecondarioTdr();
            $arrayIdOperatoriLog = $arraySchedeApprovate[$i]->getIdOperatoreSecondarioLog();
            $arrayIdOperatoriAsa = $arraySchedeApprovate[$i]->getIdOperatoreSecondarioAsa();
            $arrayIdOperatoriOss = $arraySchedeApprovate[$i]->getIdOperatoreSecondarioOss();
            $arrayIdOperatoriInf = $arrayIdOperatoriInf->toArray();
            $arrayIdOperatoriTdr = $arrayIdOperatoriTdr->toArray();
            $arrayIdOperatoriLog = $arrayIdOperatoriLog->toArray();
            $arrayIdOperatoriAsa = $arrayIdOperatoriAsa->toArray();
            $arrayIdOperatoriOss = $arrayIdOperatoriOss->toArray();

            $arrayIdOperatoriSecondari = array_merge($arrayIdOperatoriInf, $arrayIdOperatoriTdr, $arrayIdOperatoriLog, $arrayIdOperatoriAsa, $arrayIdOperatoriOss);


            for ($j = 0; $j < count($arrayIdOperatoriSecondari); $j++) {

                $idOperatore = $arrayIdOperatoriSecondari[$j];
                $mail = $userRepository->findEmailById($idOperatore);
                $stringaMail = $mail[0];
                $stringaMail = implode(", ", $stringaMail);

                if (in_array($stringaMail, $arrayOperatoriGiaAvvisati)) {
                    //ho già mandato la mail una volta all'operatore. Non intasiamo la mail 
                } else {

                    $email = (new Email())
                        ->from('tecnico@metarete.it')
                        ->to($stringaMail)
                        ->subject('Schede valutazione da compilare')
                        ->text('Esiste almeno una scheda in stato approvata in cui sei operatore secondario');

                    $this->mailer->send($email);
                    array_push($arrayOperatoriGiaAvvisati, $stringaMail);
                }
            }
        }
    }
}
