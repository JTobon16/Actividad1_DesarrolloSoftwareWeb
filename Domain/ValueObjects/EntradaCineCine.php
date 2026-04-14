<?php
final class EntradaCineCine
{
    private string $value;

    public function __construct(string $value)
    {
        if (empty($value)) {
            throw new Exception("Valor inválido");
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
