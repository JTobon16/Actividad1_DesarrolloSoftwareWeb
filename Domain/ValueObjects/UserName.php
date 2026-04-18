<?php

declare(strict_types=1);

namespace Domain\ValueObjects;

final class UserName
{
    private string $value;

    public function __construct(string $value)
    {
        $value = ucwords(strtolower(trim($value)));

        if ($value === '') {
            throw new \InvalidArgumentException("Nombre inválido");
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
