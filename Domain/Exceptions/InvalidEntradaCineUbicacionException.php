<?php

declare(strict_types=1);

namespace Domain\Exceptions;

use InvalidArgumentException;

final class InvalidEntradaCineUbicacionException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(string $campo): self
    {
        return new self('El campo "' . $campo . '" no puede estar vacío.');
    }
}
