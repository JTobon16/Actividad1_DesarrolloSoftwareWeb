<?php
final class EntradaCineFecha
{
    private string $value;

    public function __construct(string $value)
    {
        if (!strtotime($value)) {
            throw new Exception("Fecha inválida");
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
