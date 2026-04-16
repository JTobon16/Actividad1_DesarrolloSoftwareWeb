<?php

declare(strict_types=1);

namespace Domain\Exceptions;

use InvalidArgumentException;

final class InvalidEntradaCineSalaException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('La sala no puede estar vacía.');
    }
}
