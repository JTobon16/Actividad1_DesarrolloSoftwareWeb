<?php

declare(strict_types=1);

namespace Application\User\Ports\Out;

use Domain\Models\UserModel;

interface SaveUserPort
{
    public function save(UserModel $user): UserModel;
}
