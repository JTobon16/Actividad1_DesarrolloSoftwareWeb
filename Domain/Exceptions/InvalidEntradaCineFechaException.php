<?php

declare(strict_types=1);

namespace Domain\Exceptions;

use InvalidArgumentException;

final class InvalidEntradaCineFechaException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('La fecha no puede estar vacía.');
    }

    public static function becauseFormatIsInvalid(string $fecha): self
    {
        return new self('Formato inválido: ' . $fecha . '. Use YYYY-MM-DD.');
    }
}
