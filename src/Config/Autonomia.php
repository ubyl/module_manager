<?php

namespace App\Config;

enum Autonomia: string
{
    case autonomo = 'autonomo';
    case parziale = 'parzialmente dipendente';
    case dipendente = 'totalmente dipendente';
}