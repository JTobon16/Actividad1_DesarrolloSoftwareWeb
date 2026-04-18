<?php

declare(strict_types=1);

namespace Application\User\Ports\In;

use Application\User\Dto\Queries\GetUserByIdQuery;
use Domain\Models\UserModel;

interface GetUserByIdUseCase
{
    public function execute(GetUserByIdQuery $query): UserModel;
}
