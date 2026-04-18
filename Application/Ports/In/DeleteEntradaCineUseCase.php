<?php

declare(strict_types=1);

namespace Application\Ports\In;

use Application\Services\Dto\Commands\DeleteEntradaCineCommand;

interface DeleteEntradaCineUseCase
{
    public function execute(DeleteEntradaCineCommand $command): void;
}
