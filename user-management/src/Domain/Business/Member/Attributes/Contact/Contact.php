<?php

namespace Domain\Business\Member\Attributes\Contact;

use Domain\Business\Member\Exception\EmptyContactException;

class Contact implements \CollectionInterface {

    private function __construct(
        private array $contact
    )
    {
        
    }

    public static function create(array $contact) : Contact
    {
        if (count($contact) === 0)
            throw new EmptyContactException('Invalid contact');
        return new Contact($contact);
    }

    public function count() : int {
        return count($this->contact);
    }
	/**
	 *
	 * @return bool
	 */
	public function isEmpty(): bool {
        return count($this->contact) === 0;
	}

    public function toArray() : array {
        return $this->contact;
    }
}