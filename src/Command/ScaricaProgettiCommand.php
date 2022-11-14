<?php

namespace App\Command;


use Doctrine\ORM\EntityManagerInterface;
use App\Service\SDManagerClientApiService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:scarica-progetti',
)]
class ScaricaProgettiCommand extends Command
{
    private $sdManagerClientApiService;
    private $entityManager;

    public function __construct(SDManagerClientApiService $sDManagerClientApiService, EntityManagerInterface $entityManager)
    {
        $this->sdManagerClientApiService = $sDManagerClientApiService;
        $this->entityManager = $entityManager;
        parent::__construct();

    }
    protected function configure(): void
    {
        $this
            ->addArgument('data_inizio', InputArgument::REQUIRED, 'data inizio')
            ->addArgument('data_fine', InputArgument::REQUIRED, 'data fine')
        ;
    }
    
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $em = $this->entityManager;
        $schedaPAIRepository = $em->getRepository(SchedaPAI::class);
        $dataInizio = $input->getArgument('data_inizio');
        $dataFine = $input->getArgument('data_fine');
        $progetti = $this->sdManagerClientApiService->getProgetti($dataInizio, $dataFine);
        dump($progetti);
        //creazione schede pai corrispondenti ai progetti scaricati
        for( $i = 0; $i< count($progetti); $i++){
            
        }
        
        $io->success('Evviva funziona.');
        return Command::SUCCESS;
    }

    
}