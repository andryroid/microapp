<?php

namespace Domain\Utils\Event;

use Domain\Utils\AggregateRoot\AggregateRoot;

interface EventManagerInterface {
    function saveEvent(AggregateRoot $aggregateRoot): void;
    public function clear(): void;

    public function hasEvent(): bool;

    public function getAggregates(): array;
}