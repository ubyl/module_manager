<?php
namespace App\Doctrine\DBAL\Type;

use App\Doctrine\DBAL\Type\EnumType;

class Valutazione extends EnumType
{

    protected $name = 'Valutazione';

    // etichetta => valore
    // mantenere allineate con workflow
    protected $values = array(
        'Valutazione Iniziale' => 'Valutazione Iniziale',
        'Valutazione Ordinaria' => 'Valutazione Ordinaria',
        'Valutazione Straordinaria' => 'Valutazione Straordinaria',
    );
}