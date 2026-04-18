<?php

declare(strict_types=1);

namespace Application\EntradaCine\Ports\In;

use Application\EntradaCine\Dto\Commands\DeleteEntradaCineCommand;

interface DeleteEntradaCineUseCase
{
    public function execute(DeleteEntradaCineCommand $command): void;
}
