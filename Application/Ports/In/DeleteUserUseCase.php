<?php

declare(strict_types=1);

namespace Application\Ports\In;

use Application\Services\Dto\Commands\DeleteUserCommand;

interface DeleteUserUseCase
{
    public function execute(DeleteUserCommand $command): void;
}
