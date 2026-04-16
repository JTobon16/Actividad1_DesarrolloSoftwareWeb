<?php

declare(strict_types=1);

namespace Domain\Exceptions;

use InvalidArgumentException;

final class InvalidEntradaCinePeliculaException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('El nombre de la película no puede estar vacío.');
    }

    public static function becauseLengthIsTooShort(int $min): self
    {
        return new self('El nombre de la película debe tener al menos ' . $min . ' caracteres.');
    }
}
