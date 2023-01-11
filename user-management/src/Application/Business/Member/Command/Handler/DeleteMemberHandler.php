<?php

namespace Application\Business\Member\Command\Handler;

use Application\Business\Member\Command\DeleteMemberCommand;
use Application\Utils\Handler\CommandHandlerInterface;
use Domain\Business\Member\Events\MemberWasDeleted;
use Domain\Business\Member\Repository\DeleteMemberRepositoryInterface;
use Domain\Utils\Event\EventManagerInterface;
use Domain\Utils\Identifier\IdentifierInterface;

final class DeleteMemberHandler implements CommandHandlerInterface {

    public function __construct(
        private DeleteMemberRepositoryInterface $deleteMemberRepositoryInterface,
        private IdentifierInterface $identifierInterface,
        private EventManagerInterface $eventManagerInterface
    )
    {
    }
    public function __invoke(DeleteMemberCommand $deleteMemberCommand) : void
    {
        $member = $deleteMemberCommand->member;
        $deleted = $this->deleteMemberRepositoryInterface->deleteMember($member->getSummary()['identifier']);
        if ($deleted) {
            $summary = $member->getSummary();
            $member->saveEvent(
                new MemberWasDeleted(
                    memberId: $summary['identifier'],
                    fullName: $summary['firstName'] . " " . $summary['lastName'],
                    contact: $summary['contact']
                )
            );
            $this->eventManagerInterface->saveEvent($member);
        }
    }
}