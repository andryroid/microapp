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
class Gender {

    private function __construct(
        private GenderType $genderType
    )
    {
        
    }
    public static function build(GenderType $genderType) : Gender {
        return new Gender($genderType);
    }

    public function getGender() : string {
        return $this->genderType === GenderType::WOMEN ? "Women" : "Men";
    }

    public function getGenderValue() : int {
        return $this->genderType === GenderType::MAN ? 1 : 0;
    }
}