<?php

declare(strict_types=1);

namespace Domain\ValueObjects;

final class EntradaCineSala
{
    private string $value;

    public function __construct(string $value)
    {
        $value = trim($value);

        if ($value === '') {
            throw new \InvalidArgumentException("Sala inválida");
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
