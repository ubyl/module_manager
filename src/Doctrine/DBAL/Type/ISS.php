<?php
namespace App\Doctrine\DBAL\Type;

use App\Doctrine\DBAL\Type\EnumType;

class ISS extends EnumType
{

    protected $name = 'ISS';

    // etichetta => valore
    // mantenere allineate con workflow
    protected $values = array(
        'presente' => 'presente',
        'presenza parziale o temporanea' => 'presenza parziale o temporanea',
        'non presente' => 'non presente',
    );
}