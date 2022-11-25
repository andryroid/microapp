<?php

namespace Application\Utils\Identifier;

use Domain\Utils\Identifier\IdentifierInterface;

final class IdentifierV1 implements IdentifierInterface 
{
    private readonly string $generatedId;
    
	/**
	 * @return string
	 */
	public function generateChar(): string {
        $this->generatedId = uniqid() . uniqid() . uniqid();
        return $this->getId();
	}
	
	/**
	 *
	 * @param IdentifierInterface $identifierInterface
	 * @return bool
	 */
	public function isEqualTo(IdentifierInterface $identifierInterface): bool {
        return $identifierInterface->getId() === $this->generatedId;
	}
	
	/**
	 * @return bool
	 */
	public function isValid(): bool {
        return strlen($this->generatedId) > 5; 
	}

    public function getId() : string 
    {
        return $this->generatedId;
    }
}