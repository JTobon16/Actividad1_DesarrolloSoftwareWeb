<?php

class InvalidEntradaCineCineException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('El nombre del cine no puede estar vacío.');
    }
}
