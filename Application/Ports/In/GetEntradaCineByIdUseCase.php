<?php

declare(strict_types=1);

namespace Application\Ports\In;

use Application\Services\Dto\Queries\GetEntradaCineByIdQuery;
use Domain\Models\EntradaCineModel;

interface GetEntradaCineByIdUseCase
{
    public function execute(GetEntradaCineByIdQuery $query): EntradaCineModel;
}
