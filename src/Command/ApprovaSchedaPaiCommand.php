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
    name: 'app:approva-scheda-pai',
    
)]
class ApprovaSchedaPaiCommand extends Command
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('id_scheda', InputArgument::REQUIRED, 'id scheda')
            
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $idScheda = $input->getArgument('id_scheda');
        $em = $this->entityManager;
        $schedaPAIRepository = $em->getRepository(SchedaPAI::class);
        $schedaPai = $schedaPAIRepository->findOneBySomeField($idScheda);
        $schedaPai->setCurrentPlace('approvata');
        $em->flush();



        $io->success('Evviva funziona. Approvata scheda pai');

        return Command::SUCCESS;
    }
}
