<?php

declare(strict_types=1);

namespace Domain\Exceptions;

use Exception;

final class InvalidUserPasswordException extends Exception
{
    public static function becauseValueIsEmpty(): self
    {
        return new self("La contraseña no puede estar vacía");
    }

    public static function becauseLengthIsTooShort(int $minLength): self
    {
        return new self("La contraseña debe tener al menos {$minLength} caracteres");
    }
}
