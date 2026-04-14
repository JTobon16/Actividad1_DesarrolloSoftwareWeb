<?php
final class EntradaCineValor
{
    private float $value;

    public function __construct(float $value)
    {
        if ($value <= 0) {
            throw new Exception("Valor inválido");
        }

        $this->value = $value;
    }

    public function value(): float
    {
        return $this->value;
    }
}
