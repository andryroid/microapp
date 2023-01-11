<?php

namespace Application\Business\Member\Command;

use Domain\Business\Member\Member;
use Domain\Utils\Attributes\Command;
use Domain\Utils\Attributes\MessageInterface;

#[Command]
class DeleteMemberCommand implements MessageInterface {

    private function __construct(public readonly Member $member)
    {
        
    }

    public static function build(Member $member) : DeleteMemberCommand {
        return new DeleteMemberCommand($member);
    }
}