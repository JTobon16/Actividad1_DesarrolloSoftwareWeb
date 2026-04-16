<?php

namespace Domain\ValueObjects;

final class EntradaCineHora
{
    private string $value;

    public function __construct(string $value)
    {
        if (!preg_match('/^\d{2}:\d{2}$/', $value)) {
            throw new \InvalidArgumentException("Hora inválida");
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
