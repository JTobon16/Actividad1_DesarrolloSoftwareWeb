<?php

declare(strict_types=1);

namespace Application\User\Dto\Commands;

final class DeleteUserCommand
{
    public function __construct(private string $id) {}

    public function getId(): string
    {
        return $this->id;
    }
}
