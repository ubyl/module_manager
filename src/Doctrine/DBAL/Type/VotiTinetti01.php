<?php

namespace App\Doctrine\DBAL\Type;

use App\Doctrine\DBAL\Type\EnumType;

Class VotiTinetti01 extends EnumType
{
    protected $name = 'VotiTinetti01';

    // etichetta => valore
    // mantenere allineate con workflow
    protected $values = array(
        0 => 0,
        1 => 1,
    );
}