<?php
namespace Domain\Business\Member\Repository;

use Domain\Business\Member\Member;

interface FindMemberRepositoryInterface {
    function findByIdentifier(string $memberIdentifier): Member | null;
}