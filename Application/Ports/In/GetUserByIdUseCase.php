<?php

declare(strict_types=1);

namespace Application\Ports\In;

use Application\Services\Dto\Queries\GetUserByIdQuery;
use Domain\Models\UserModel;

interface GetUserByIdUseCase
{
    public function execute(GetUserByIdQuery $query): UserModel;
}
