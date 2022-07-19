<?php

namespace App\Config;

enum FANF: string
{
    case presenza_24 = 'presenza 24h su 24';
    case presenza_saltuaria = "presenza saltuaria a ore nell'arco della settimana";
    case giorni_feriali = 'solo giorni feriali';
}