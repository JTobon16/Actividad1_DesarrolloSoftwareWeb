<?php

declare(strict_types=1);

namespace Application\User\Ports\Out;

use Domain\Models\UserModel;
use Domain\ValueObjects\UserId;

interface GetUserByIdPort
{
    public function findById(UserId $id): ?UserModel;
}
