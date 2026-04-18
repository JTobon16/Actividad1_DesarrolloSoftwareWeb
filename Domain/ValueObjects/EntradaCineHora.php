<?php

declare(strict_types=1);

namespace Domain\ValueObjects;

final class EntradaCineHora
{
    private string $value;

    public function __construct(string $value)
    {
        $value = trim($value);


        if (preg_match('/^\d{1,2}:\d{2}$/', $value)) {
            $value .= ':00';
        }

        // Validar formato final HH:MM:SS
        if (!preg_match('/^\d{1,2}:\d{2}:\d{2}$/', $value)) {
            throw new \InvalidArgumentException("Hora inválida");
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
