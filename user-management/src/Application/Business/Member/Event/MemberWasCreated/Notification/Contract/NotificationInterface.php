<?php

namespace Application\Business\Member\Event\MemberWasCreated\Notification\Contract;

use Domain\Business\Member\Events\MemberWasCreated;

interface NotificationInterface 
{
    function sendNotification(MemberWasCreated $userCreated): void;
}