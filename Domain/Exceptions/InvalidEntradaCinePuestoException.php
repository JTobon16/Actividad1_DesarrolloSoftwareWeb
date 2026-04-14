<?php

class InvalidEntradaCinePuestoException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('El puesto no puede estar vacío.');
    }
}
