<?php

declare(strict_types=1);

final class EntradaCineCentroComercial
{
    private string $value;

    public function __construct(string $value)
    {
        if (empty(trim($value))) {
            throw new Exception("Centro comercial inválido");
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
