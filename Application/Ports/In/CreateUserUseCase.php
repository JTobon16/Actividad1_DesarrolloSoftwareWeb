<?php

declare(strict_types=1);

namespace Application\User\Ports\In;

use Application\User\Dto\Commands\CreateUserCommand;
use Domain\Models\UserModel;

interface CreateUserUseCase
{
    public function execute(CreateUserCommand $command): UserModel;
}
