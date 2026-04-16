<?php

declare(strict_types=1);

namespace Domain\ValueObjects;

final class EntradaCineValor
{
    private float $value;

    public function __construct(float $value)
    {
        if ($value <= 0) {
            throw new \InvalidArgumentException("Valor inválido");
        }

        $this->value = $value;
    }

    public function value(): float
    {
        return $this->value;
    }
}
