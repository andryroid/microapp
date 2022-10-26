<?php
namespace Domain\Business\Member\Repository;

use Domain\Business\Member\Member;

interface CreateMemberRepositoryInterface {
    function save(Member $member): string;
}