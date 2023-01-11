<?php

namespace Application\Business\Member\Query\Member\Handler;

use Application\Business\Member\Query\Member\FindOneMemberQuery;
use Application\Utils\Handler\QueryHandlerInterface;
use Domain\Business\Member\Member;
use Domain\Business\Member\Repository\FindMemberRepositoryInterface;

final class FindOneMemberHandler implements QueryHandlerInterface
{
    public function __construct(private FindMemberRepositoryInterface $memberFinder)
    {
        
    }
    public function __invoke(FindOneMemberQuery $queryMember) : Member | null
    {
        return $this->memberFinder->findByIdentifier($queryMember->memberIdentifier);
    }
}