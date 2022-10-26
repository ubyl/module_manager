<?php

namespace App\Service;

use Symfony\Component\Mime\Email;
use App\Entity\EntityPAI\SchedaPAI;
use App\Entity\User;
use App\Repository\UserRepository;
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

        if($numeroSchedeNuove != null){
            $email = (new Email())
                ->from('tecnico@metarete.it')
                ->to('admin@live.it')
                ->subject('Schede nello stato Nuova')
                ->text('Esiste almeno una scheda nello stato Nuova che deve essere approvata');

            $this->mailer->send($email);
        }
    }

    public function EmailOperatorePrincipale()
    {
        $em = $this->entityManager;
        $schedaPAIRepository = $em->getRepository(SchedaPAI::class);
        $userRepository = $em->getRepository(User::class);
        $listaOperatori = $schedaPAIRepository->findListaOperatori('approvata');

        for($i =0; $i<count($listaOperatori); $i++)
        {
            $test = $listaOperatori[$i]; 
            $idOperatore = $test->getEmail();
            $mail = $userRepository->findEmailById($idOperatore);
        
            $email = (new Email())
                ->from('tecnico@metarete.it')
                ->to($mail)
                ->subject('Schede in stato approvata')
                ->text('Esiste almeno una scheda in stato approvata in cui sei operatore principale che deve essere attivata ');

            $this->mailer->send($email);
        }
    }

    public function EmailOperatoreSecondario()
    {
        $em = $this->entityManager;
        $schedaPAIRepository = $em->getRepository(SchedaPAI::class);
        
        $email = (new Email())
            ->from('tecnico@metarete.it')
            ->to('robyliga@live.it')
            ->subject('Site update just happened!')
            ->text('Someone just updated the site. We told them: ');

        $this->mailer->send($email);
    }
}   