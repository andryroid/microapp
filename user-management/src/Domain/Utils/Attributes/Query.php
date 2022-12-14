<?php
namespace Domain\Utils\Attributes;
use Attribute;


#[Attribute(Attribute::TARGET_CLASS)]
class Query implements BusInterface {
    public const BUS = 'query.bus';

    public function getBus() : string {
        return self::BUS;
    }
}