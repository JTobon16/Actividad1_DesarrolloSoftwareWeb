<?php

declare(strict_types=1);

namespace Domain\Exceptions;

use InvalidArgumentException;

final class InvalidUserRoleException extends InvalidArgumentException
{
    public static function becauseValueIsInvalid(string $value): self
    {
        return new self('Rol inválido: ' . $value);
    }
}
