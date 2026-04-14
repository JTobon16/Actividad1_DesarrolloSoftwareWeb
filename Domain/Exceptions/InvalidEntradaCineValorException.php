<?php

class InvalidEntradaCineValorException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('El valor de la entrada no puede estar vacío.');
    }

    public static function becauseValueIsNotPositive(): self
    {
        return new self('El valor de la entrada debe ser mayor a cero.');
    }
}
