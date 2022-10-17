<?php

namespace App\Command;

use App\Entity\EntityPAI\SchedaPAI;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:scheda-pai',
    description: 'Simulazione creazione scheda pai da SD-Manager',
)]
class SchedaPaiCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->addArgument('Operatore Principale', InputArgument::OPTIONAL, 'Inserisci l id dell operatore scelto')
            ->addArgument('Operatore Secondario Inf', InputArgument::OPTIONAL, 'Inserisci l id dell operatore scelto')
            ->addArgument('Operatore Secondario Tdr', InputArgument::OPTIONAL, 'Inserisci l id dell operatore scelto')
            ->addArgument('Operatore Secondario Log', InputArgument::OPTIONAL, 'Inserisci l id dell operatore scelto')
            ->addArgument('Operatore Secondario Asa', InputArgument::OPTIONAL, 'Inserisci l id dell operatore scelto')
            ->addArgument('Operatore Secondario Oss', InputArgument::OPTIONAL, 'Inserisci l id dell operatore scelto')
            ->addArgument('Assistito', InputArgument::OPTIONAL, 'Argument description')
            ->addArgument('Console', InputArgument::OPTIONAL, 'Argument description')
            ->addArgument('Progetto', InputArgument::OPTIONAL, 'Argument description')
            
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $schedaPai = new SchedaPAI;

        $operatorePrincipale = $input->getArgument('Operatore Principale');
        $operatoreSecondarioInf = $input->getArgument('Operatore Secondario Inf');
        $operatoreSecondarioInf = $operatoreSecondarioInf->explode(',');
        $operatoreSecondarioTdr = $input->getArgument('Operatore Secondario Tdr');
        $operatoreSecondarioTdr = $operatoreSecondarioTdr->explode(',');
        $operatoreSecondarioLog = $input->getArgument('Operatore Secondario Log');
        $operatoreSecondarioLog = $operatoreSecondarioLog->explode(',');
        $operatoreSecondarioAsa = $input->getArgument('Operatore Secondario Asa');
        $operatoreSecondarioAsa = $operatoreSecondarioAsa->explode(',');
        $operatoreSecondarioOss = $input->getArgument('Operatore Secondario Oss');
        $operatoreSecondarioOss = $operatoreSecondarioOss->explode(',');
        $assistito = $input->getArgument('Assistito');
        $console = $input->getArgument('Console');
        $progetto = $input->getArgument('Progetto');

        $schedaPai->setIdOperatorePrincipale($operatorePrincipale);
        $schedaPai->addidOperatoreSecondarioInf($operatoreSecondarioInf);
        $schedaPai->addidOperatoreSecondarioTdr($operatoreSecondarioTdr);
        $schedaPai->addidOperatoreSecondarioLog($operatoreSecondarioLog);
        $schedaPai->addidOperatoreSecondarioAsa($operatoreSecondarioAsa);
        $schedaPai->addidOperatoreSecondarioOss($operatoreSecondarioOss);
        $schedaPai->setIdAssistito($assistito);
        $schedaPai->setIdConsole($console);
        $schedaPai->setIdProgetto($progetto);
        $schedaPai->setCurrentPlace('nuova');

        //$schedaPAIRepository->add($schedaPAI, true);

       

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
