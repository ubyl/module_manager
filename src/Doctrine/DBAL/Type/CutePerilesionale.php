<?php
namespace App\Doctrine\DBAL\Type;

use App\Doctrine\DBAL\Type\EnumType;

class CutePerilesionale extends EnumType
{

    protected $name = 'CutePerilesionale';

    // etichetta => valore
    // mantenere allineate con workflow
    protected $values = array(
        'Integra' => 'Integra',
        'Arrossata' => 'Arrossata',
        'Macerata' => 'Macerata',
    );
}