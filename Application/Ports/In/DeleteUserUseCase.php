<?php

declare(strict_types=1);

namespace Application\User\Ports\In;

use Application\User\Dto\Commands\DeleteUserCommand;

interface DeleteUserUseCase
{
    public function execute(DeleteUserCommand $command): void;
}
