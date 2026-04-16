<?php

declare(strict_types=1);

namespace Domain\Events;

use Domain\ValueObjects\UserId;

final class UserDeletedDomainEvent extends DomainEvent
{
    private UserId $userId;

    public function __construct(UserId $userId)
    {
        parent::__construct('user.deleted');
        $this->userId = $userId;
    }

    public function payload(): array
    {
        return [
            'id' => $this->userId->value(),
        ];
    }
}
