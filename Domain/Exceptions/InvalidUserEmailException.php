<?php

declare(strict_types=1);

namespace Domain\Exceptions;

use InvalidArgumentException;

final class InvalidUserEmailException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('El email no puede estar vacío.');
    }

    public static function becauseFormatIsInvalid(string $email): self
    {
        return new self('Formato inválido: ' . $email);
    }
}
