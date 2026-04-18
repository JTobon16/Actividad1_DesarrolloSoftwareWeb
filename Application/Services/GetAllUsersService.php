<?php

declare(strict_types=1);

namespace Application\User\Services;

use Application\Ports\In\GetAllUsersUseCase;
use Application\Ports\Out\GetAllUsersPort;
use Application\Services\Dto\Queries\GetAllUsersQuery;

final class GetAllUsersService implements GetAllUsersUseCase
{
    public function __construct(
        private GetAllUsersPort $getAllUsersPort
    ) {}

    public function execute(GetAllUsersQuery $query): array
    {
        return $this->getAllUsersPort->FindAll();
    }
}
