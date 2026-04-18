<?php

declare(strict_types=1);

namespace Application\Services;

use Application\Ports\In\GetAllEntradasCineUseCase;
use Application\Ports\Out\GetAllEntradasCinePort;
use Application\Services\Dto\Queries\GetAllEntradasCineQuery;

final class GetAllEntradasCineService implements GetAllEntradasCineUseCase
{
    public function __construct(
        private GetAllEntradasCinePort $getAllEntradasCinePort
    ) {}

    public function execute(GetAllEntradasCineQuery $query): array
    {
        return $this->getAllEntradasCinePort->FindAll();
    }
}
