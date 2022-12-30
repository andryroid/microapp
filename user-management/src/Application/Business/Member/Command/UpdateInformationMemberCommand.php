<?php

namespace Application\Business\Member\Command;

use Domain\Utils\Attributes\Command;
use Domain\Utils\Attributes\MessageInterface;

#[Command]
class UpdateInformationMemberCommand implements MessageInterface {

    private function __construct(
        public  string $memberIdentification,
        public array $data 
    )
    {
        
    }

    public static function build(string $memberIdentification,array $data) : UpdateInformationMemberCommand {
        return new UpdateInformationMemberCommand(
            memberIdentification: $memberIdentification,
            data: $data
        );
    }
}