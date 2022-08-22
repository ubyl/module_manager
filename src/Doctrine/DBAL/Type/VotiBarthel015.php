<?php

namespace App\Doctrine\DBAL\Type;

use App\Doctrine\DBAL\Type\EnumType;

class VotiBarthel015 extends EnumType
{
    protected $name = 'VotiBarthel015';

    // etichetta => valore
    // mantenere allineate con workflow
    protected $values = array(
        15 => 15,
        12 => 12,
        8 => 8,
        3 => 3,
        0 => 0,
    );

}
