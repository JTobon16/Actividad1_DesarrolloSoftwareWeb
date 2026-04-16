<?php

declare(strict_types=1);

namespace Domain\Exceptions;

use InvalidArgumentException;

final class InvalidEntradaCineHoraException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('La hora no puede estar vacía.');
    }

    public static function becauseFormatIsInvalid(string $hora): self
    {
        return new self('Formato inválido: ' . $hora . '. Use HH:MM.');
    }
}
