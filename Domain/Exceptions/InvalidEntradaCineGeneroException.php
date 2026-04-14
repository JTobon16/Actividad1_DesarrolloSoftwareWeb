<?php

class InvalidEntradaCineGeneroException extends InvalidArgumentException
{
    public static function becauseValueIsInvalid(string $value): self
    {
        return new self('El género "' . $value . '" no es un género válido.');
    }
}
