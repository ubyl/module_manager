<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:user:edit',
    description: 'Cambia la password a un utente',
)]
class UserEditCommand extends Command
{

    private $em;
    private $passwordHasher;

    public function __construct(EntityManagerInterface $em, UserPasswordHasherInterface $passwordHasher)
    {
        $this->em = $em;
        $this->passwordHasher = $passwordHasher;
        //
        parent::__construct();
    }


    protected function configure(): void
    {
        $this
            ->addArgument('email', InputArgument::REQUIRED, 'E-mail dell\'utente')
            ->addOption('password', null, InputOption::VALUE_REQUIRED, 'Modifica la password')
            ->addOption('role', null, InputOption::VALUE_REQUIRED, 'Modifica il ruolo (ADMIN o USER)')
            ->addOption('firstName', null, InputOption::VALUE_REQUIRED, 'Modifica nome')
            ->addOption('lastName', null, InputOption::VALUE_REQUIRED, 'Modifica cognome')
            ->addOption('enable', null, InputOption::VALUE_NONE, 'Abilita un utente')
            ->addOption('disable', null, InputOption::VALUE_NONE, 'Disabilita un utente')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $email = $input->getArgument('email');
        $plainPassword = $input->getOption('password');
        $role = $input->getOption('role');
        $firstName = $input->getOption('firstName');
        $lastName = $input->getOption('lastName');
        $enable = $input->getOption('enable');
        $disable = $input->getOption('disable');

        // recupera utente
        $userRepo = $this->em->getRepository(User::class);
        $user = $userRepo->findOneBy(['email' => $email]);
        if (!$user) {
            $io->error('Utente non trovato');
            return Command::FAILURE;
        }

        $persist = false;

        if ($plainPassword) {
            $hashedPassword = $this->passwordHasher->hashPassword(
                $user,
                $plainPassword
            );
            $user->setPassword($hashedPassword);
            $io->success('Password aggiornata');
            $persist = true;
        }

        if ($role) {
            $user->setRoles([$role]);
            $io->success('Ruolo aggiornato');
            $persist = true;
        }

        if ($firstName) {
            $user->setName($firstName);
            $io->success('Nome aggiornato');
            $persist = true;
        }

        if ($lastName) {
            $user->setSurname($lastName);
            $io->success('Cognome aggiornato');
            $persist = true;
        }

        if ($enable) {
            $user->setIsVerified(true);
            $io->success('Utente abilitato');
            $persist = true;
        } elseif ($disable) {
            $user->setIsVerified(false);
            $io->success('Utente disabilitato');
            $persist = true;
        }

        if ($persist) {
            $this->em->persist($user);
            $this->em->flush();
        }

        return Command::SUCCESS;
    }
}
