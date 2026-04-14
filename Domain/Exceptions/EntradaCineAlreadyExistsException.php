<?php

class EntradaCineAlreadyExistsException extends DomainException
{
    public static function becauseEntradaAlreadyExists(string $id): self
    {
        return new self('Ya existe una entrada de cine con el ID: ' . $id);
    }
}
