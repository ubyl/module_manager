<?php
namespace App\Doctrine\DBAL\Type;

use App\Doctrine\DBAL\Type\EnumType;

class BordiLesione extends EnumType
{

    protected $name = 'BordiLesione';

    // etichetta => valore
    // mantenere allineate con workflow
    protected $values = array(
        'Lineari' => 'Lineari',
        'Macerati' => 'Macerati',
        'Necrotici' => 'Necrotici',
        'Infetti' => 'Infetti',
        'Frastagliati' => 'Frastagliati',
    );
}