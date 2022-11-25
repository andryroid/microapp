<?php

namespace Domain\Business\Member\Events;
use Domain\Utils\Attributes\MessageInterface;

final class MemberWasCreated implements MessageInterface {
    public function __construct(private readonly string $memberId)
    {
        
    }
}