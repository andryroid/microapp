<?php

namespace Domain\Business\Member\Events;

use Domain\Utils\Attributes\Event;
use Domain\Utils\Attributes\MessageInterface;

#[Event]
final class MemberWasDeleted implements MessageInterface {
    public function __construct(
        public readonly string $memberId,
        public readonly string $fullName,
        public readonly array $contact
        )
    {
        
    }
}