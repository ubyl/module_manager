<?php

namespace App\Command;

use App\Entity\EntityPAI\SchedaPAI;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:chiudi-progetto',
    
)]
class ChiudiProgettoCommand extends Command
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('id_progetto', InputArgument::REQUIRED, 'id progetto')
            
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $idProgetto = $input->getArgument('id_progetto');
        $em = $this->entityManager;
        $schedaPAIRepository = $em->getRepository(SchedaPAI::class);
        $schedaPai = $schedaPAIRepository->findOneBy(['idProgetto' =>$idProgetto]);
        $schedaPai->setCurrentPlace('in_attesa_di_chiusura');
        $em->flush();



        $io->success('Evviva funziona. Scheda pai in attesa di chiusura');

        return Command::SUCCESS;
    }
}