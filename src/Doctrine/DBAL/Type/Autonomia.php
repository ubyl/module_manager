<?php
namespace App\Doctrine\DBAL\Type;

use App\Doctrine\DBAL\Type\EnumType;

class Autonomia extends EnumType
{

    protected $name = 'Autonomia';

    // etichetta => valore
    // mantenere allineate con workflow
    protected $values = array(
        'autonomo' => 'autonomo',
        'parzialmente dipendente' => 'parzialmente dipendente',
        'totalmente dipendente' => 'totalmente dipendente',
    );
}