<?php

class InvalidEntradaCineUbicacionException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(string $campo): self
    {
        return new self('El campo "' . $campo . '" de ubicación no puede estar vacío.');
    }
}
