<?php

namespace Application\Business\Member\Command;

use Domain\Business\Member\Member;
use Domain\Utils\Attributes\Command;
use Domain\Utils\Attributes\MessageInterface;

#[Command]
class UpdateInformationMemberCommand implements MessageInterface {

    private function __construct(
        public Member $member,
        public array $data 
    )
    {
        
    }

    public static function build(Member $member,array $data) : UpdateInformationMemberCommand {
        return new UpdateInformationMemberCommand(
            member: $member,
            data: $data
        );
    }
}