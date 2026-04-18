<?php

declare(strict_types=1);

namespace Application\Ports\In;

use Application\Services\Dto\Commands\CreateUserCommand;
use Domain\Models\UserModel;

interface CreateUserUseCase
{
    public function execute(CreateUserCommand $command): UserModel;
}
