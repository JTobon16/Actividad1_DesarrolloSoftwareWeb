<?php

namespace Domain\ValueObjects;

final class EntradaCinePelicula
{
    private string $value;

    public function __construct(string $value)
    {
        $value = trim($value);

        if ($value === '') {
            throw new \InvalidArgumentException("Película inválida");
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
