<?php

namespace App\Doctrine\DBAL\Type;

use App\Doctrine\DBAL\Type\EnumType;

class VotiBarthel010 extends EnumType
{
    protected $name = 'VotiBarthel010';

    // etichetta => valore
    // mantenere allineate con workflow
    protected $values = array(
        10 => 10,
        8 => 8,
        5 => 5,
        2 => 2,
        0 => 0,
    );
    
}