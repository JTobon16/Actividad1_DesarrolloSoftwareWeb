<?php

declare(strict_types=1);

namespace Application\User\Ports\Out;

use Domain\ValueObjects\UserId;

interface DeleteUserPort
{
    public function delete(UserId $id): void;
}
