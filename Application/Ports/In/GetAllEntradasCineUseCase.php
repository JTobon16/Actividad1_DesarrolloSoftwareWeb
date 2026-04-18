<?php

declare(strict_types=1);

namespace Application\EntradaCine\Ports\In;

use Application\EntradaCine\Dto\Queries\GetAllEntradasCineQuery;
use Domain\Models\EntradaCineModel;

interface GetAllEntradasCineUseCase
{
    public function execute(GetAllEntradasCineQuery $query): array;
}
