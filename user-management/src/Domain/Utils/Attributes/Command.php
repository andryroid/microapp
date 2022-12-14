<?php
namespace Domain\Utils\Attributes;
use Attribute;


#[Attribute(Attribute::TARGET_CLASS)]
class Command implements BusInterface {
    public const BUS = 'command.bus';

    public function getBus() : string {
        return self::BUS;
    }
}