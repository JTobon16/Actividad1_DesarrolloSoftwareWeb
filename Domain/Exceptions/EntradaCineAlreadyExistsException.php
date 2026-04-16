<?php

declare(strict_types=1);

namespace Domain\Exceptions;

use DomainException;

final class EntradaCineAlreadyExistsException extends DomainException
{
    public static function becauseEntradaAlreadyExists(string $id): self
    {
        return new self('Ya existe una entrada de cine con el ID: ' . $id);
    }
}
