<?php

declare(strict_types=1);

namespace Application\EntradaCine\Ports\In;

use Application\EntradaCine\Dto\Commands\CreateEntradaCineCommand;
use Domain\Models\EntradaCineModel;

interface CreateEntradaCineUseCase
{
    public function execute(CreateEntradaCineCommand $command): EntradaCineModel;
}
