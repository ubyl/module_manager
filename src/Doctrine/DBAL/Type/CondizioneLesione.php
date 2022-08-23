<?php
namespace App\Doctrine\DBAL\Type;

use App\Doctrine\DBAL\Type\EnumType;

class CondizioneLesione extends EnumType
{

    protected $name = 'CondizioneLesione';

    // etichetta => valore
    // mantenere allineate con workflow
    protected $values = array(
        'Detersa' => 'Detersa',
        'Fibrina' => 'Fibrina',
        'Essudato' => 'Essudato',
        'Necrosi' => 'Necrosi',
        'Infetta' => 'Infetta',
    );
}