<?php

declare(strict_types=1);

namespace Application\User\Ports\In;

use Application\User\Dto\Queries\GetAllUsersQuery;
use Domain\Models\UserModel;

interface GetAllUsersUseCase
{
    public function execute(GetAllUsersQuery $query): array;
}
