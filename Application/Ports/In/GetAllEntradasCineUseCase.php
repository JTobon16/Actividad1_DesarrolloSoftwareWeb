<?php

declare(strict_types=1);

namespace Application\Ports\In;

use Application\Services\Dto\Queries\GetAllEntradasCineQuery;
use Domain\Models\EntradaCineModel;

interface GetAllEntradasCineUseCase
{
    public function execute(GetAllEntradasCineQuery $query): array;
}
