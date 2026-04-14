<?php

declare(strict_types=1);

final class UserId
{
    private string $value;

    public function __construct(string $value)
    {
        if (empty($value)) {
            throw new Exception("UserId inválido");
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
