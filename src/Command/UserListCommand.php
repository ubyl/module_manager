<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\Table;

#[AsCommand(
    name: 'app:user:list',
    description: 'Elenca gli utenti',
)]
class UserListCommand extends Command
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
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {

        $table = new Table($output);
        $table->setHeaders(['Id', 'Email', 'First NAme', 'Last Name', 'Roles', 'Enabled']);

        // recupera utenti
        $userRepo = $this->em->getRepository(User::class);
        $users = $userRepo->findAll();
        $arrayRows = [];
        foreach ($users as $user) {
            $arrayRows[] = [$user->getId(), $user->getEmail(), $user->getName(), $user->getSurname(), implode(",", $user->GetRoles()), ($user->isVerified()) ? 'Y' : 'N'];
        }
        $table->setRows($arrayRows);
        $table->render();

        return Command::SUCCESS;
    }
}
