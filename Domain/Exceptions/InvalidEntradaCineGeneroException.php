<?php

declare(strict_types=1);

namespace Domain\Exceptions;

use InvalidArgumentException;

final class InvalidEntradaCineGeneroException extends InvalidArgumentException
{
    public static function becauseValueIsInvalid(string $value): self
    {
        return new self('El género "' . $value . '" no es válido.');
    }
}
