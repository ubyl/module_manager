<?php

namespace App\EventListener;

use Doctrine\ORM\Events;
use App\Entity\EntityPAI\Tinetti;
use App\Service\SetterTotaliTinettiService;
use App\Service\DateCompilazioneSchedeService;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Doctrine\Bundle\DoctrineBundle\EventSubscriber\EventSubscriberInterface;

class CheckTinetti implements EventSubscriberInterface
{
    private $dateCompilazioneSchede;
    private $setterTotaliTinettiService;

    public function __construct(DateCompilazioneSchedeService $dateCompilazioneSchede, SetterTotaliTinettiService $setterTotaliTinettiService)
    {
       $this->dateCompilazioneSchede = $dateCompilazioneSchede;
       $this->setterTotaliTinettiService = $setterTotaliTinettiService;
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
        if (!$o instanceof Tinetti) {
            return;
        }
        $entity = $o->getSchedaPAI();
        
        $this->dateCompilazioneSchede->settaScadenzarioSchede($entity);
        $this->setterTotaliTinettiService->settaTotali($o);
        
    }
    public function postPersist(LifecycleEventArgs $args): void
    {
        $o = $args->getObject();
        

        // if this subscriber only applies to certain entity types,
        // add some code to check the entity type as early as possible
        if (!$o instanceof Tinetti) {
            return;
        }
        $entity = $o->getSchedaPAI();
        
        $this->dateCompilazioneSchede->settaScadenzarioSchede($entity);
        $this->setterTotaliTinettiService->settaTotali($o);
    }
    public function postRemove(LifecycleEventArgs $args): void
    {
        $o = $args->getObject();
        

        // if this subscriber only applies to certain entity types,
        // add some code to check the entity type as early as possible
        if (!$o instanceof Tinetti) {
            return;
        }
        $entity = $o->getSchedaPAI();
        
        $this->dateCompilazioneSchede->settaScadenzarioSchede($entity);
        
    }
    
    
   
}