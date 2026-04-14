<?php

class InvalidEntradaCineHoraException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('La hora no puede estar vacía.');
    }

    public static function becauseFormatIsInvalid(string $hora): self
    {
        return new self('El formato de la hora es inválido: ' . $hora . '. Use el formato HH:MM.');
    }
}
