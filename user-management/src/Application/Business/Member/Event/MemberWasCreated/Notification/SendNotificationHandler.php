<?php

namespace Application\Business\Member\Event\MemberWasCreated\Notification;

use Application\Business\Member\Event\MemberWasCreated\Notification\Contract\NotificationInterface;
use Application\Utils\Handler\EventHandlerInterface;
use Domain\Business\Member\Events\MemberWasCreated;

final class SendNotificationHandler implements EventHandlerInterface
{
    public function __construct(private NotificationInterface $notificationInterface)
    {
        
    }
    public function __invoke(MemberWasCreated $memberWasCreated)
    {
        $this->notificationInterface->sendNotification($memberWasCreated);
    }
}