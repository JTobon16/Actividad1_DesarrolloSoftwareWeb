<?php

declare(strict_types=1);

namespace Application\Ports\In;

use Application\Services\Dto\Commands\CreateEntradaCineCommand;
use Domain\Models\EntradaCineModel;

interface CreateEntradaCineUseCase
{
    public function execute(CreateEntradaCineCommand $command): EntradaCineModel;
}
