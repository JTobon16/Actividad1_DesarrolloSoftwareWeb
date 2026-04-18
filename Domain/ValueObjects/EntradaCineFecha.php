<?php

declare(strict_types=1);

namespace Domain\ValueObjects;

final class EntradaCineFecha
{
    private string $value;

    public function __construct(string $value)
    {
        $value = trim($value);

        if (!strtotime($value)) {
            throw new \InvalidArgumentException("Fecha inválida");
        }

        $this->value = date('Y-m-d', strtotime($value));
    }

    public function value(): string
    {
        return $this->value;
    }
}
