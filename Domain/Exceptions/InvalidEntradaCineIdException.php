<?php

class InvalidEntradaCineIdException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('El ID de la entrada de cine no puede estar vacío.');
    }
}
