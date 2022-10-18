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
    name: 'app:crea-operatore',
)]
class CreaOperatoreCommand extends Command
{
    private $entityManager;
    private $userPasswordHasher;

    public function __construct(EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->entityManager = $entityManager;
        $this->userPasswordHasher = $userPasswordHasher;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('nome', InputArgument::REQUIRED, 'nome')
            ->addArgument('cognome', InputArgument::REQUIRED, 'cognome')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $em = $this->entityManager;
        $userRepository = $em ->getRepository(User::class);
        $user = new User();
        $nome = $input->getArgument('nome');
        $cognome = $input->getArgument('cognome');
        $password = 'prova1';
        $role[0] = 'ROLE_USER';
        $isVerified = true;
        $email = $nome . '.' . $cognome . '@live.it';

        $hashedPassword = $this->userPasswordHasher->hashPassword(
            $user,
            $password
        );

        $user -> setName($nome);
        $user -> setSurname($cognome);
        $user -> setPassword($hashedPassword);
        $user -> setRoles($role);
        $user -> setIsVerified($isVerified);
        $user -> setEmail($email);
        $userRepository->add($user, true);
        

        $io->success('Evviva funziona. Operatore creato');

        return Command::SUCCESS;
    }
}
