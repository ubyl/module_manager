<?php

namespace App\Config;

enum ISS: string
{
    case presente = 'presente';
    case presenza_parziale = 'presenza parziale e/o temporanea';
    case non_presente = 'non presente';
}