<?php

class InvalidUserNameException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('El nombre del usuario no puede estar vacio.');
    }

    public static function becauseLengthIsTooShort(int $min): self
    {
        return new self('El nombre del usuario debe tener al menos ' . $min . ' caracteres.');
    }
}
