<?php

namespace App\Doctrine\DBAL\Type;

use App\Doctrine\DBAL\Type\EnumType;

class VotiTinetti02 extends EnumType
{
    protected $name = 'VotiTinetti02';

    // etichetta => valore
    // mantenere allineate con workflow
    protected $values = array(
        0 => 0,
        1 => 1,
        2 => 2,
    );
}