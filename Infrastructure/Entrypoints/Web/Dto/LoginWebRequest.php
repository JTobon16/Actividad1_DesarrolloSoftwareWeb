<?php

namespace Infrastructure\Entrypoints\Web\Dto;

class LoginWebRequest
{
    public function __construct(private array $data) {}

    public function email(): string
    {
        return $this->data['email'] ?? '';
    }

    public function password(): string
    {
        return $this->data['password'] ?? '';
    }
}
