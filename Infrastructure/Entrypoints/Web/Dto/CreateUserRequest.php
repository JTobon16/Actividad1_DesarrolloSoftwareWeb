<?php

declare(strict_types=1);

namespace Infrastructure\Entrypoints\Web\Controllers\Dto;

final class CreateUserRequest
{
    public function __construct(
        private string $id,
        private string $name,
        private string $email,
        private string $password,
        private string $role
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'] ?? '',
            $data['name'] ?? '',
            $data['email'] ?? '',
            $data['password'] ?? '',
            $data['role'] ?? ''
        );
    }

    public function id(): string
    {
        return $this->id;
    }
    public function name(): string
    {
        return $this->name;
    }
    public function email(): string
    {
        return $this->email;
    }
    public function password(): string
    {
        return $this->password;
    }
    public function role(): string
    {
        return $this->role;
    }
}
