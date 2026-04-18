<?php

declare(strict_types=1);

namespace Application\Ports\In;

use Application\Services\Dto\Queries\GetEntradaCineByIdQuery;

interface GetEntradaCineByIdUseCase
{
    public function execute(GetEntradaCineByIdQuery $query);
}
