<?php

namespace Domain\Business\Member;

use Domain\Business\Member\Attributes\Contact\Contact;
use Domain\Business\Member\Attributes\Gender;
use Domain\Business\Member\Exception\EmptyContactException;
use Domain\Business\Member\Exception\IncorrectUsernameException;
use Domain\Utils\AggregateRoot\AggregateRoot;
use Domain\Utils\Identifier\IdentifierInterface;

class Member extends AggregateRoot {
    private function __construct(
        private string $identifier,
        private \DateTime $memberSinceAt = new \DateTIme(),
        private string $firstName,
        private string $lastName,
        private Contact $contact,
        private Gender $gender
    )
    {
        
    }

    public static function create(
        IdentifierInterface $identifier,
        string $firstName,
        string $lastName,
        Contact $contact,
        Gender $gender
    ) : Member {
        //check for error
        if ($firstName === "")
            throw new IncorrectUsernameException('Incorrect first name');
        if ($lastName === "")
            throw new IncorrectUsernameException('Incorrect last name');
        if ($contact->isEmpty())
            throw new EmptyContactException('Contact is empty');

        return new Member(
            identifier: $identifier->generateChar(),
            firstName: $firstName,
            lastName: $lastName,
            contact: $contact,
            gender:$gender,
            memberSinceAt: new \DateTime()
        );
    }

    public function getSummary() : array {
        return [
            'identifier' => $this->identifier,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'gender' => [
                'value' => $this->gender->getGenderValue(),
                'text' =>$this->gender->getGender()
            ],
            'contact' => $this->contact,
            'memberSinceAt' => $this->memberSinceAt
        ];
    }
}