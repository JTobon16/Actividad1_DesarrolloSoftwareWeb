<?php

final class EntradaCineId
{
    private string $value;

    public function __construct(string $value)
    {
        if (empty($value)) {
            throw new Exception("Id inválido");
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
