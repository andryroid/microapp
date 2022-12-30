<?php

namespace Infrastructure\Service\Notification\Member;

use Application\Business\Member\Event\MemberWasCreated\Notification\Contract\NotificationInterface;
use Domain\Business\Member\Events\MemberWasCreated;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

final class EmailNotification implements NotificationInterface
{
    public function __construct(private MailerInterface $mailer)
    {
        
    }
	/**
	 * @param \Domain\Business\Member\Events\MemberWasCreated $userCreated
	 * @return mixed
	 */
	public function sendNotification(MemberWasCreated $userCreated): void {
        /*$email = (new Email())
            ->from('hello@example.com')
            ->to('you@example.com')
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');
        $this->mailer->send($email);*/
        dump('sending email notification here');
    }
}