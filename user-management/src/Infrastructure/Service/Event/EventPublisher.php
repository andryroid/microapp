-- Active: 1666269039866@@127.0.0.1@3306
<?php

namespace Infrastructure\Service\Event;

use Domain\Utils\Event\EventManagerInterface;
use Infrastructure\Common\Message\MessageDispatcherInterface as MessageMessageDispatcherInterface;

class EventPublisher
{
    public function __construct(
        private EventManagerInterface $eventManager,
        private MessageMessageDispatcherInterface $messageDispatcher
    ) {
    }

    public function publishEvents(): void
    {
        /** @var AggregateRoot $aggregate */
        foreach ($this->eventManager->getAggregates() as $aggregate) {
            foreach ($aggregate->getEvents() as $event) {
                $this->messageDispatcher->dispatchMessage($event);
            }
        }
    }

}