<?php

namespace App\Doctrine\DBAL\Type;

use App\Doctrine\DBAL\Type\EnumType;

Class VotiRilevazioneVas extends EnumType
{
    protected $name = 'VotiRilevazioneVas';

    // etichetta => valore
    // mantenere allineate con workflow
    protected $values = array(
        'As' => 'As',
        'ML' => 'ML',
        'Li' => 'Li',
        'Mo' => 'Mo',
        'Fo' => 'Fo',
        'Fs' => 'Fs',
    );
}