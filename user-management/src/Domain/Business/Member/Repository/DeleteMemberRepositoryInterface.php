<?php
namespace Domain\Business\Member\Repository;

interface DeleteMemberRepositoryInterface {
    function deleteMember(string $memberIdentifier): bool;
}