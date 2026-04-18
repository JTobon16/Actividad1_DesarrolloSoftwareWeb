<?php

declare(strict_types=1);

namespace Application\Ports\In;

use Application\Services\Dto\Commands\UpdateEntradaCineCommand;
use Domain\Models\EntradaCineModel;

interface UpdateEntradaCineUseCase
{
    public function execute(UpdateEntradaCineCommand $command): EntradaCineModel;
}
