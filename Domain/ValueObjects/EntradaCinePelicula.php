<?php
final class EntradaCinePelicula
{
    private string $value;

    public function __construct(string $value)
    {
        if (empty($value)) {
            throw new Exception("Película inválida");
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
