<?php

declare(strict_types=1);

namespace Domain\Exceptions;

use InvalidArgumentException;

final class InvalidUserNameException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('El nombre no puede estar vacío.');
    }

    public static function becauseLengthIsTooShort(int $min): self
    {
        return new self('Debe tener al menos ' . $min . ' caracteres.');
    }
}
