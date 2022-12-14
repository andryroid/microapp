<?php

namespace Domain\Utils\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
final class Event implements BusInterface {
    public const BUS = 'event.bus';
	/**
	 * @return string
	 */
	public function getBus(): string {
        return self::BUS;
	}
}