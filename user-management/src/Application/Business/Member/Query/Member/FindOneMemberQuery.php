<?php

namespace Application\Business\Member\Query\Member;
use Domain\Utils\Attributes\MessageInterface;
use Domain\Utils\Attributes\Query;

#[Query]
final class FindOneMemberQuery implements MessageInterface
{
    private function __construct(public readonly string $memberIdentifier)
    {
        
    }
    public static function build(string $memberIdentifier) : FindOneMemberQuery
    {
        return new FindOneMemberQuery($memberIdentifier);
    }
}