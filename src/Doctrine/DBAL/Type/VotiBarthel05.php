<?php

namespace App\Doctrine\DBAL\Type;

use App\Doctrine\DBAL\Type\EnumType;

class VotiBarthel05 extends EnumType
{
    protected $name = 'VotiBarthel05';

    // etichetta => valore
    // mantenere allineate con workflow
    protected $values = array(
        5 => 5,
        4 => 4,
        3 => 3,
        1 => 1,
        0 => 0,
    );

}