<?php

declare(strict_types=1);

namespace Application\Ports\Out;

use Domain\Models\UserModel;

interface GetAllUsersPort
{
    public function findAll(): array; // array de UserModel
}
