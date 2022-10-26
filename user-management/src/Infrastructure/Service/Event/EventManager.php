<?php

namespace Infrastructure\Service\Event;

use Domain\Utils\Event\EventManagerInterface;

final class EventManager implements EventManagerInterface {
    
	/**
	 */
	function __construct(
        private array $aggregates = []
    ) {
	}
	/**
	 *
	 * @param \Domain\Utils\AggregateRoot\AggregateRoot $aggregateRoot
	 */
	function saveEvent(\Domain\Utils\AggregateRoot\AggregateRoot $aggregateRoot): void {
        $this->aggregates[] = $aggregateRoot;
	}
	
	/**
	 */
	function clear(): void {
        unset($this->aggregates);
	}
	
	/**
	 *
	 * @return bool
	 */
	function hasEvent(): bool {
        /** @var AggregateRoot $aggregate */
        foreach ($this->aggregates as $aggregate) {
            if ($aggregate->hasDomainEvent()) {
                return true;
            }
        }

        return false;
	}

    public function getAggregates() : array {
        return $this->aggregates;
    }
}