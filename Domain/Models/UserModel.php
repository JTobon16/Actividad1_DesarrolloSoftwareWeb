<?php

declare(strict_types=1);

namespace Domain\Models;

use Domain\ValueObjects\UserId;
use Domain\ValueObjects\UserName;
use Domain\ValueObjects\UserEmail;
use Domain\ValueObjects\UserPassword;
use Domain\Enums\UserRoleEnum;
use Domain\Enums\UserStatusEnum;

final class UserModel
{
    private UserId       $id;
    private UserName     $name;
    private UserEmail    $email;
    private UserPassword $password;
    private string       $role;
    private string       $status;

    public function __construct(
        UserId       $id,
        UserName     $name,
        UserEmail    $email,
        UserPassword $password,
        string       $role,
        string       $status
    ) {
        UserRoleEnum::ensureIsValid($role);
        UserStatusEnum::ensureIsValid($status);

        $this->id       = $id;
        $this->name     = $name;
        $this->email    = $email;
        $this->password = $password;
        $this->role     = $role;
        $this->status   = $status;
    }

    public static function create(
        UserId       $id,
        UserName     $name,
        UserEmail    $email,
        UserPassword $password,
        string       $role
    ): self {
        return new self($id, $name, $email, $password, $role, UserStatusEnum::PENDING);
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function name(): UserName
    {
        return $this->name;
    }

    public function email(): UserEmail
    {
        return $this->email;
    }

    public function password(): UserPassword
    {
        return $this->password;
    }

    public function role(): string
    {
        return $this->role;
    }

    public function status(): string
    {
        return $this->status;
    }

    public function activate(): self
    {
        return new self(
            $this->id,
            $this->name,
            $this->email,
            $this->password,
            $this->role,
            UserStatusEnum::ACTIVE
        );
    }

    public function deactivate(): self
    {
        return new self(
            $this->id,
            $this->name,
            $this->email,
            $this->password,
            $this->role,
            UserStatusEnum::INACTIVE
        );
    }

    public function block(): self
    {
        return new self(
            $this->id,
            $this->name,
            $this->email,
            $this->password,
            $this->role,
            UserStatusEnum::BLOCKED
        );
    }

    public function toArray(): array
    {
        return [
            'id'       => $this->id->value(),
            'name'     => $this->name->value(),
            'email'    => $this->email->value(),
            'password' => $this->password->value(),
            'role'     => $this->role,
            'status'   => $this->status,
        ];
    }
}
