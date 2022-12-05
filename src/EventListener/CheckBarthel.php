<?php

namespace App\EventListener;

use App\Entity\EntityPAI\Barthel;
use App\Service\DateCompilazioneSchedeService;
use App\Entity\EntityPAI\SchedaPAI;
use Doctrine\Bundle\DoctrineBundle\EventSubscriber\EventSubscriberInterface;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class CheckBarthel implements EventSubscriberInterface
{
    private $dateCompilazioneSchede;

    public function __construct(DateCompilazioneSchedeService $dateCompilazioneSchede)
    {
       $this->dateCompilazioneSchede = $dateCompilazioneSchede;
    }

    public function getSubscribedEvents(): array
    {
        return [
            Events::postUpdate,
            Events::postPersist,
            Events::postRemove,
            
        ];
    }

    public function postUpdate(LifecycleEventArgs $args): void
    {
        $o = $args->getObject();
        

        // if this subscriber only applies to certain entity types,
        // add some code to check the entity type as early as possible
        if (!$o instanceof Barthel) {
            return;
        }
        $entity = $o->getSchedaPAI();
        
        $this->dateCompilazioneSchede->settaScadenzarioSchede($entity);
        
    }
    public function postPersist(LifecycleEventArgs $args): void
    {
        $o = $args->getObject();
        

        // if this subscriber only applies to certain entity types,
        // add some code to check the entity type as early as possible
        if (!$o instanceof Barthel) {
            return;
        }
        $entity = $o->getSchedaPAI();
        
        $this->dateCompilazioneSchede->settaScadenzarioSchede($entity);
        
    }
    public function postRemove(LifecycleEventArgs $args): void
    {
        $o = $args->getObject();
        

        // if this subscriber only applies to certain entity types,
        // add some code to check the entity type as early as possible
        if (!$o instanceof Barthel) {
            return;
        }
        $entity = $o->getSchedaPAI();
        
        $this->dateCompilazioneSchede->settaScadenzarioSchede($entity);
        
    }
    
    
   
}