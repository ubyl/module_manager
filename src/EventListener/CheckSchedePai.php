<?php

namespace App\EventListener;

use App\Service\DateCompilazioneSchedeService;
use App\Entity\EntityPAI\SchedaPAI;
use Doctrine\Bundle\DoctrineBundle\EventSubscriber\EventSubscriberInterface;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class CheckSchedePai implements EventSubscriberInterface
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
            
            
        ];
    }

    public function postUpdate(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();
        

        // if this subscriber only applies to certain entity types,
        // add some code to check the entity type as early as possible
        if (!$entity instanceof SchedaPAI) {
            return;
        }
        
        $this->dateCompilazioneSchede->settaScadenzarioSchede($entity);
        
    }
}