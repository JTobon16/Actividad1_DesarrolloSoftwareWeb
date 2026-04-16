<?php

declare(strict_types=1);

namespace Domain\Events;

use Domain\Models\UserModel;

final class UserUpdatedDomainEvent extends DomainEvent
{
    private UserModel $user;

    public function __construct(UserModel $user)
    {
        parent::__construct('user.updated');
        $this->user = $user;
    }

    public function payload(): array
    {
        return [
            'id'     => $this->user->id()->value(),
            'name'   => $this->user->name()->value(),
            'email'  => $this->user->email()->value(),
            'role'   => $this->user->role(),
            'status' => $this->user->status(),
        ];
    }
}
