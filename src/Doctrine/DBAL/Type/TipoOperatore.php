<?php
namespace App\Doctrine\DBAL\Type;

use App\Doctrine\DBAL\Type\EnumType;

class TipoOperatore extends EnumType
{

    protected $name = 'TipoOperatore';

    // etichetta => valore
    // mantenere allineate con workflow
    protected $values = array(
        'INF' => 'INF',
        'TDR' => 'TDR',
        'LOG' => 'LOG',
        'ASA' => 'ASA',
        'OSS' => 'OSS'
    );
}