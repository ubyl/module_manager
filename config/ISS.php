<?php

namespace App\Config;

enum ISS: string
{
    case presente = 'presente';
    case presenzaParziale = 'presenza parziale e/o temporanea';
    case nonPresente = 'non presente';
}