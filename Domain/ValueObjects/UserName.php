<?php

declare(strict_types=1);



final class UserName
{
    private string $value;

    public function __construct(string $value)
    {
        if (empty($value)) {
            throw new \InvalidArgumentException("Nombre inválido");
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
