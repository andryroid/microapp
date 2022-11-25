<?php

namespace Infrastructure\Service\Event;

use Domain\Utils\AggregateRoot\AggregateRoot;
use Domain\Utils\Event\EventManagerInterface;

final class EventManager implements EventManagerInterface {
    
	/**
	 */
	public function __construct(
        private array $aggregates = []
    ) {
	}
	/**
	 *
	 * @param \Domain\Utils\AggregateRoot\AggregateRoot $aggregateRoot
	 */
	public function saveEvent(\Domain\Utils\AggregateRoot\AggregateRoot $aggregateRoot): void {
        $this->aggregates[] = $aggregateRoot;
	}
	
	/**
	 */
	public function clear(): void {
        unset($this->aggregates);
	}
	
	/**
	 *
	 * @return bool
	 */
	public function hasEvent(): bool {
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