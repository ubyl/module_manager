<?php

namespace App\Config;

enum PANF: string
{
    case presenteConFunzioniCareGiver = 'presente con funzione di care giver';
    case presenteSenzaFunzioniCareGiver = 'presente senza funzione di care giver';
    case nonPresente = 'non presente';
}