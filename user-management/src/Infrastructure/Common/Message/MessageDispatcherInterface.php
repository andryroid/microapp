<?php

namespace Infrastructure\Common\Message;

use Domain\Utils\Attributes\MessageInterface;

interface MessageDispatcherInterface {
    public function dispatchMessage(MessageInterface $messageInterface): mixed;
}