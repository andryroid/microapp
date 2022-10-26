<?php

namespace Infrastructure\Common\Message;

use Domain\Utils\Attributes\BusInterface;
use Domain\Utils\Attributes\MessageInterface;
use Psr\Container\ContainerInterface;
use ReflectionAttribute;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;
use Symfony\Contracts\Service\ServiceSubscriberInterface;

final class MessageDispatcher implements MessageDispatcherInterface,ServiceSubscriberInterface  {
    
    /**
	 */
	public function __construct(
        private ContainerInterface $locator
    ) {
	}

	/**
	 *
	 * @param \Domain\Utils\Attributes\MessageInterface $messageInterface
	 *
	 * @return mixed
	 */
	public function dispatchMessage(MessageInterface $message): mixed {
        $envelop = $this->getBus($message)->dispatch($message);
        $handledStamps = $envelop->all(HandledStamp::class);
        /** @var HandledStamp $stamp */
        $stamp = $envelop->last(HandledStamp::class);
        dd($stamp);
        return $stamp?->getResult();
    }

    private function getBus(MessageInterface $message): MessageBusInterface
    {
        $class = new \ReflectionClass($message);
        $attributes = $class->getAttributes(
            BusInterface::class,
            ReflectionAttribute::IS_INSTANCEOF
        );
        $busType = isset($attributes[0]) ? $attributes[0]->newInstance() : null;
        if (is_null($busType)) {
            throw new \LogicException('no bus specified for this message');
        }
        
        return $this->locator->get($busType->getBus());
    }
	

    public static function getSubscribedServices(): array
    {
        return [
            'command.bus' => '?' . MessageBusInterface::class,
            'query.bus' => '?' . MessageBusInterface::class,
            'event.bus' => '?' . MessageBusInterface::class,
        ];
    }
}