<?php

declare(strict_types=1);

namespace Application\Ports\Out;

use Domain\Models\UserModel;
use Domain\ValueObjects\UserEmail;

interface GetUserByEmailPort
{
    public function findByEmail(UserEmail $email): ?UserModel;
}
