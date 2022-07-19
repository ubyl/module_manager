<?php

namespace App\Config;

enum PANF: string
{
    case presente_con_funzioni_care_giver = 'presente con funzione di care giver';
    case presente_senza_funzioni_care_giver = 'presente senza funzione di care giver';
    case non_presente = 'non presente';
}