<?php

namespace App\Config;

enum Disturbi: string
{
    case assenti = 'assenti/lievi';
    case moderati = 'moderati';
    case gravi = 'gravi';
}