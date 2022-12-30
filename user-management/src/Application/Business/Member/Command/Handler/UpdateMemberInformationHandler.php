<?php

namespace Application\Business\Member\Command\Handler;

use Application\Business\Member\Command\CreateMemberCommand;
use Application\Utils\Handler\CommandHandlerInterface;
use Domain\Business\Member\Member;
use Domain\Business\Member\Repository\CreateMemberRepositoryInterface;
use Domain\Utils\Event\EventManagerInterface;
use Domain\Utils\Identifier\IdentifierInterface;

final class UpdateInformationMemberHandler implements CommandHandlerInterface {

    public function __construct(
        private CreateMemberRepositoryInterface $createMemberRepositoryInterface,
        private IdentifierInterface $identifierInterface,
        private EventManagerInterface $eventManagerInterface
    )
    {
    }
    public function __invoke(CreateMemberCommand $createMemberCommand)
    {
        $newMember = Member::create(
            identifier: $this->identifierInterface,
            firstName: $createMemberCommand->firstName,
            lastName: $createMemberCommand->lastName,
            contact: $createMemberCommand->contact,
            gender: $createMemberCommand->gender
        );
        $this->eventManagerInterface->saveEvent($newMember);
        return $this->createMemberRepositoryInterface->save($newMember);
    }
}