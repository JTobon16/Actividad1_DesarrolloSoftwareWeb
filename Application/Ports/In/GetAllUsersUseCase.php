<?php

declare(strict_types=1);

namespace Application\Ports\In;

use Application\Services\Dto\Queries\GetAllUsersQuery;
use Domain\Models\UserModel;

interface GetAllUsersUseCase
{
    public function execute(GetAllUsersQuery $query): array;
}
