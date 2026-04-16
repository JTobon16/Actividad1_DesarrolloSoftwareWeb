<?php

declare(strict_types=1);

namespace Domain\Exceptions;

use DomainException;

final class EntradaCineNotFoundException extends DomainException
{
    public static function becauseIdWasNotFound(string $id): self
    {
        return new self('No se encontró una entrada de cine con el ID: ' . $id);
    }
}
