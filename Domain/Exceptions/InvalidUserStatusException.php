<?php

declare(strict_types=1);

namespace Domain\Exceptions;

use InvalidArgumentException;

final class InvalidUserStatusException extends InvalidArgumentException
{
    public static function becauseValueIsInvalid(string $value): self
    {
        return new self('Estado inválido: ' . $value);
    }
}
