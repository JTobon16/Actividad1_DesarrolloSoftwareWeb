<?php

class InvalidEntradaCineFechaException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('La fecha no puede estar vacía.');
    }

    public static function becauseFormatIsInvalid(string $fecha): self
    {
        return new self('El formato de la fecha es inválido: ' . $fecha . '. Use el formato YYYY-MM-DD.');
    }
}
