<?php

class InvalidEntradaCineSalaException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(): self
    {
        return new self('La sala no puede estar vacía.');
    }
}
