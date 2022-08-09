<?php

namespace App\Config;

enum TipoOperatore: string
{
    case Inf = 'INF';
    case Tdr = 'TDR';
    case Log = 'LOG';
    case Asa = 'ASA';
    case Oss = 'OSS';
}