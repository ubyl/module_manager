<?php

namespace App\Service;

use DateTime;
use App\Entity\EntityPAI\SchedaPAI;
use phpDocumentor\Reflection\Types\Integer;

class DateCompilazioneSchedeService
{

    public function settaScadenzarioSchede(SchedaPAI $schedaPAI)
    {
        $this->settaScadenzarioBarthel($schedaPAI);

    }
    public function settaScadenzarioBarthel(SchedaPAI $schedaPAI)
    {
        $attivazioneBarthel = $schedaPAI->isAbilitaBarthel();
        $frequenzaBarthel = $schedaPAI->getFrequenzaBarthel();
        $prova = $schedaPAI->getIdBarthel();
        $numeroBarthelPresenti = $prova->count();
        
        if( $attivazioneBarthel == false && $frequenzaBarthel == 0){
            return null;
        }
        
        $dataInizio = $schedaPAI->getDataInizio();
        $dataOggi = new DateTime();
        $dataOggi->format('Y-m-d');
        $frequenzaBarthel = $schedaPAI->getFrequenzaBarthel();
        $numeroGiorniAdOggi = $dataOggi->diff($dataInizio)->format("%a");
        $totaleBarthelAdOggi = (int)($numeroGiorniAdOggi / $frequenzaBarthel);
        
        
    }
}