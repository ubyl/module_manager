<?php
namespace App\Doctrine\DBAL\Type;

use App\Doctrine\DBAL\Type\EnumType;

class GradoLesione extends EnumType
{

    protected $name = 'GradoLesione';

    // etichetta => valore
    // mantenere allineate con workflow
    protected $values = array(
        'I°' => 'I°',
        'II°' => 'II°',
        'III°' => 'III°',
        'IV°' => 'IV°',
        'Escara' => 'Escara',
    );
}