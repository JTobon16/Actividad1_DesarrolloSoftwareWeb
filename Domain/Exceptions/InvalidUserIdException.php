<?php

declare(strict_types=1);

namespace Domain\Exceptions;

use InvalidArgumentException;

final class InvalidUserIdException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('El ID no puede estar vacío.');
    }
}
