<?php

namespace App\Config;

enum FANF: string
{
    case presenza24 = 'presenza 24h su 24';
    case presenzaSaltuaria = "presenza saltuaria a ore nell'arco della settimana";
    case giorniFeriali = 'solo giorni feriali';
}