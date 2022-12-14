<?php

namespace Domain\Business\Member\Attributes;

enum GenderType {
    case MAN;
    case WOMEN;

    public static function build(int $gender) : GenderType {
        if ($gender === 0) return GenderType::WOMEN;
        return GenderType::MAN;
    }
}