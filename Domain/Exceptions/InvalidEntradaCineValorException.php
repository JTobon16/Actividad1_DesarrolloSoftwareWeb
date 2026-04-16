<?php

declare(strict_types=1);

namespace Domain\Exceptions;

use InvalidArgumentException;

final class InvalidEntradaCineValorException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('El valor no puede estar vacío.');
    }

    public static function becauseValueIsNotPositive(): self
    {
        return new self('El valor debe ser mayor a cero.');
    }
}
