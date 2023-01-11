<?php

namespace Domain\Business\Member;

use Domain\Business\Member\Attributes\Contact\Contact;
use Domain\Business\Member\Attributes\Gender;
use Domain\Business\Member\Events\MemberWasCreated;
use Domain\Business\Member\Events\MemberWasUpdated;
use Domain\Business\Member\Exception\EmptyContactException;
use Domain\Business\Member\Exception\IncorrectUsernameException;
use Domain\Utils\AggregateRoot\AggregateRoot;
use Domain\Utils\Attributes\MessageInterface;
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
        $member = new Member(
            identifier: $identifier->generateChar(),
            firstName: $firstName,
            lastName: $lastName,
            contact: $contact,
            gender: $gender,
            memberSinceAt: new \DateTime()
        );
        $member->addEvent(new MemberWasCreated($member->getSummary()['identifier']));
        return $member;
    }

    public static function init(
        string $identifier,
        string $firstName,
        string $lastName,
        Contact $contact,
        Gender $gender,
        \DateTime $memberSinceAt
    ) : Member {
        //check for error
        if ($firstName === "")
            throw new IncorrectUsernameException('Incorrect first name');
        if ($lastName === "")
            throw new IncorrectUsernameException('Incorrect last name');
        if ($contact->isEmpty())
            throw new EmptyContactException('Contact is empty');
        $member = new Member(
            identifier: $identifier,
            firstName: $firstName,
            lastName: $lastName,
            contact: $contact,
            gender:$gender,
            memberSinceAt: $memberSinceAt
        );
        $member->addEvent(new MemberWasUpdated($member->getSummary()['identifier']));
        return $member;
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

    public function updateFirstName(string $newFirstName): self
    {
        $this->firstName = $newFirstName;
        return $this;
    }

     public function updateLastName(string $newLastName): self
    {
        $this->lastName = $newLastName;
        return $this;
    }

    public function saveEvent(MessageInterface $messageInterface)
    {
        $this->saveEvent($messageInterface);
    }
}