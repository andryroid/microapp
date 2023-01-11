<?php

namespace Application\Business\Member\Command\Handler;

use Application\Business\Member\Command\UpdateInformationMemberCommand;
use Application\Utils\Handler\CommandHandlerInterface;
use Domain\Business\Member\Events\MemberWasUpdated;
use Domain\Business\Member\Repository\CreateMemberRepositoryInterface;
use Domain\Utils\Event\EventManagerInterface;

final class UpdateInformationMemberHandler implements CommandHandlerInterface {

    public function __construct(
        private EventManagerInterface $eventManagerInterface,
        private CreateMemberRepositoryInterface $createMemberRepositoryInterface
    )
    {
    }
    public function __invoke(UpdateInformationMemberCommand $updateMemberCommand)
    {
        $member = $updateMemberCommand->member;
        $data = $updateMemberCommand->data;
        //update member domain object
        if (isset($data['firstName']))
            $member->updateFirstName($data['firstName']);
        if (isset($data['lastName']))
            $member->updateLastName($data['lastName']);
        //save domain event
        $member->saveEvent(new MemberWasUpdated($member->getSummary()['identifier']));
        $this->eventManagerInterface->saveEvent($member);
        return $this->createMemberRepositoryInterface->update($member);
    }
}