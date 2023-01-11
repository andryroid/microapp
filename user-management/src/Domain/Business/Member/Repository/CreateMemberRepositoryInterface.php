<?php
namespace Domain\Business\Member\Repository;

use Domain\Business\Member\Member;

interface CreateMemberRepositoryInterface {
    function save(Member $member): string;
    function update(Member $member): array;
}