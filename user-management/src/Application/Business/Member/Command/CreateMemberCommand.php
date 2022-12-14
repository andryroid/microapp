<?php

namespace Application\Business\Member\Command;

use Domain\Business\Member\Attributes\Contact\Contact;
use Domain\Business\Member\Attributes\Gender;
use Domain\Business\Member\Attributes\GenderType;
use Domain\Utils\Attributes\Command;
use Domain\Utils\Attributes\MessageInterface;

#[Command]
class CreateMemberCommand implements MessageInterface {

    private function __construct(
        public  string $firstName, 
        public  string $lastName,
        public  Contact $contact,
        public  Gender $gender
    )
    {
        
    }

    public static function build(array $data) : CreateMemberCommand {
        $firstName = $data['firstName'] ?? "";
        $lastName = $data['lastName'] ?? "";
        $contact = Contact::create($data['contact'] ?? []);
        $gender = Gender::build(GenderType::build($data['gender'] ?? 1));
        return new CreateMemberCommand(
            firstName: $firstName,
            lastName:$lastName,
            contact: $contact,
            gender: $gender
        );
    }
}