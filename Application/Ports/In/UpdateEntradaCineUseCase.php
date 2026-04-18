<?php

declare(strict_types=1);

namespace Application\EntradaCine\Ports\In;

use Application\EntradaCine\Dto\Commands\UpdateEntradaCineCommand;
use Domain\Models\EntradaCineModel;

interface UpdateEntradaCineUseCase
{
    public function execute(UpdateEntradaCineCommand $command): EntradaCineModel;
}
