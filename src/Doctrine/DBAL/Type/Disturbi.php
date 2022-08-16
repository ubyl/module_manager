<?php
namespace App\Doctrine\DBAL\Type;

use App\Doctrine\DBAL\Type\EnumType;

class Disturbi extends EnumType
{

    protected $name = 'Disturbi';

    // etichetta => valore
    // mantenere allineate con workflow
    protected $values = array(
        'assenti/lievi' => 'assenti/lievi',
        'moderati' => 'moderati',
        'gravi' => 'gravi',
    );
}