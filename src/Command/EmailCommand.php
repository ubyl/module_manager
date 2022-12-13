<?php

namespace App\Command;


use App\Service\MailerGenerator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


#[AsCommand(
    name: 'app:email',
)]
class EmailCommand extends Command
{
    private $mailer;

    public function __construct(MailerGenerator $mailer)
    {
        $this->mailer = $mailer;
        parent::__construct();

    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $this->mailer->EmailAdmin();
        $this->mailer->EmailOperatore();
        $io->success('Evviva funziona. Email mandate');

        return Command::SUCCESS;

    }
}