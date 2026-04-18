<?php

namespace Infrastructure\Entrypoints\Web\Dto;

class CreateEntradaCineRequest
{
    public function __construct(private array $data) {}

    public function get(string $key): string
    {
        return $this->data[$key] ?? '';
    }
}
