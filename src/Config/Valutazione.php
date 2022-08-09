<?php

namespace App\Config;

enum Valutazione: string
{
    case iniziale = 'Valutazione iniziale';
    case ordinaria = 'Valutazione ordinaria';
    case straordinaria = 'Valutazione straordinaria';
}