<?php

namespace Infrastructure\Controller;

use Domain\Utils\Attributes\MessageInterface;
use Infrastructure\Common\Message\MessageDispatcherInterface;
use Infrastructure\Common\Response\ResponseManagerInterface;

abstract class AbstractController {
    public function __construct(
        protected ResponseManagerInterface $responseManagerInterface,
        protected MessageDispatcherInterface $messageDispatcherInterface
    ) {

    }

    public function query(MessageInterface $message): mixed
    {
        return $this->messageDispatcherInterface->dispatchMessage($message);
    }

    public function command(MessageInterface $message): mixed
    {
        return $this->messageDispatcherInterface->dispatchMessage($message);
    }

}