<?php
namespace App\Doctrine\DBAL\Type;

use App\Doctrine\DBAL\Type\EnumType;

class PANF extends EnumType
{

    protected $name = 'PANF';

    // etichetta => valore
    // mantenere allineate con workflow
    protected $values = array(
        'presenza con funzione di care giver' => 'presenza con funzione di care giver',
        'presenza senza funzione di care giver' => 'presenza senza funzione di care giver',
        'non presente' => 'non presente',
    );
}