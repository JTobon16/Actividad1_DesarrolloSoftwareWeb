<?php

declare(strict_types=1);

namespace Domain\ValueObjects;

final class EntradaCinePelicula
{
    private string $value;

    public function __construct(string $value)
    {
        $value = ucwords(strtolower(trim($value)));

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
