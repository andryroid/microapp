<?php

namespace Domain\Utils\Identifier;

interface IdentifierInterface {
    function generateChar(): string;
    function isEqualTo(IdentifierInterface $identifierInterface): bool;
    function isValid(): bool;

    function getId(): string;
}