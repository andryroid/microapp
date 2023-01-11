<?php

namespace Domain\Business\Member\Events;

use Domain\Utils\Attributes\Event;
use Domain\Utils\Attributes\MessageInterface;

#[Event]
final class MemberWasUpdated implements MessageInterface {
    public function __construct(private readonly string $memberId)
    {
        
    }
}