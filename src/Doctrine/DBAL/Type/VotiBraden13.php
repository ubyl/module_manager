<?php

namespace App\Doctrine\DBAL\Type;

use App\Doctrine\DBAL\Type\EnumType;

class VotiBraden13 extends EnumType
{
    protected $name = 'VotiBraden13';

    // etichetta => valore
    // mantenere allineate con workflow
    protected $values = array(
        1 => 1,
        2 => 2,
        3 => 3,
    );

}