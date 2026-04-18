<?php

declare(strict_types=1);

namespace Application\EntradaCine\Services;

use Application\EntradaCine\Ports\In\GetAllEntradasCineUseCase;
use Application\EntradaCine\Ports\Out\GetAllEntradasCinePort;
use Application\EntradaCine\Dto\Queries\GetAllEntradasCineQuery;

final class GetAllEntradasCineService implements GetAllEntradasCineUseCase
{
    public function __construct(
        private GetAllEntradasCinePort $getAllEntradasCinePort
    ) {}

    public function execute(GetAllEntradasCineQuery $query): array
    {
        return $this->getAllEntradasCinePort->getAll();
    }
}
