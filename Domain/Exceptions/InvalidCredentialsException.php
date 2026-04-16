<?php

declare(strict_types=1);

namespace Domain\Exceptions;

use DomainException;

final class InvalidCredentialsException extends DomainException
{
    public static function becauseCredentialsAreInvalid(): self
    {
        return new self('Correo o contraseña incorrectos.');
    }

    public static function becauseUserIsNotActive(): self
    {
        return new self('Tu cuenta no está activa. Contacta al administrador.');
    }
}
