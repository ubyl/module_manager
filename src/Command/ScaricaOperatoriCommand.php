<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\SDManagerClientApiService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


#[AsCommand(
    name: 'app:scarica-operatori',
)]
class ScaricaOperatoriCommand extends Command
{
    private $sdManagerClientApiService;
    private $entityManager;
    private $userPasswordHasher;

    public function __construct(SDManagerClientApiService $sDManagerClientApiService, EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->sdManagerClientApiService = $sDManagerClientApiService;
        $this->entityManager = $entityManager;
        $this->userPasswordHasher = $userPasswordHasher;

        parent::__construct();

    }

    protected function configure(): void
    {
        
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $em = $this->entityManager;
        $userRepository = $em->getRepository(User::class);
        $utenti = $this->sdManagerClientApiService->getUtenti();
        for( $i = 0; $i< count($utenti); $i++){
            $userUtente=$utenti[$i]['username'];
            if($userRepository->findOneByUsername($userUtente)== null){
                $utente = new User;
                if($utenti[$i]['emails']!=null ){
                $email = $utenti[$i]['emails'][0]['email'];
                dump($email);
                $utente->setEmail($email);
                }
                else
                $utente->setEmail('emailtestvuoto@metarete.it');

                
                $password = 'prova1';
                $hashedPassword = $this->userPasswordHasher->hashPassword(
                    $utente,
                    $password
                );
                
                $utente->setPassword($hashedPassword);
                $utente->setName($utenti[$i]['nome']);
                $utente->setSurname($utenti[$i]['cognome']);
                $role[0] = 'ROLE_USER';
                $utente->setRoles($role);
                $utente->setUsername($userUtente);

                $userRepository->add($utente, true);
            }
        }

        $io->success('Evviva funziona.');

        return Command::SUCCESS;


    }
}