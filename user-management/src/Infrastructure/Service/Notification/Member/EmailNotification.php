<?php

namespace Infrastructure\Service\Notification\Member;

use Application\Business\Member\Event\MemberWasCreated\Notification\Contract\NotificationInterface;
use Domain\Business\Member\Events\MemberWasCreated;

final class EmailNotification implements NotificationInterface
{
    public function __construct()
    {
        
    }
	/**
	 * @param \Domain\Business\Member\Events\MemberWasCreated $userCreated
	 * @return mixed
	 */
	public function sendNotification(MemberWasCreated $userCreated): void {
        dump('here');
    }
}