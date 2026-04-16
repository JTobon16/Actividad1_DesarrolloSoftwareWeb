<?php

declare(strict_types=1);

namespace Domain\Exceptions;

use InvalidArgumentException;

final class InvalidEntradaCinePuestoException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('El puesto no puede estar vacío.');
    }
}
