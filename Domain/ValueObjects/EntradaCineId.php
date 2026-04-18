<?php

declare(strict_types=1);

namespace Domain\ValueObjects;

final class EntradaCineId
{
    private string $value;

    public function __construct(string $value)
    {
        $value = trim($value);

        if ($value === '') {
            throw new \InvalidArgumentException("ID inválido");
        }

        $this->value = $value;
    }


    public static function generate(): self
    {
        return new self(bin2hex(random_bytes(16)));
    }

    public function value(): string
    {
        return $this->value;
    }
}
