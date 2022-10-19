<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ConfirmationQuestion;

#[AsCommand(
    name: 'app:user:delete',
    description: 'Elimina un utente',
)]
class UserDeleteCommand extends Command
{

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        //
        parent::__construct();
    }


    protected function configure(): void
    {
        $this
            ->addArgument('email', InputArgument::REQUIRED, 'E-mail dell\'utente')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $email = $input->getArgument('email');

        // recupera utente
        $userRepo = $this->em->getRepository(User::class);
        $user = $userRepo->findOneBy(['email' => $email]);
        if (!$user) {
            $io->error('Utente non trovato');
            return Command::FAILURE;
        }

        $helper = $this->getHelper('question');
        $question = new ConfirmationQuestion('Sei sicuro di voler cancellare l\'utente '.$email.'? (y/n) ', false);

        if ($helper->ask($input, $output, $question)) {
            $this->em->remove($user);
            $this->em->flush();
            $io->info("Utente rimosso");
            return Command::SUCCESS;
        }

        return Command::SUCCESS;
    }
}
