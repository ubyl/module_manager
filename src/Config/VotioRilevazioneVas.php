<?php

namespace App\Config;

enum VotiRilevazioneVas: string
{
    case assente  = 'As';
    case moltoLieve = 'ML';
    case lieve = 'Li';
    case moderato = 'Mo';
    case forte = 'Fo';
    case fortissimo = 'Fs';
}