<?php

declare(strict_types=1);

namespace Application\User\Ports\In;

use Application\User\Dto\Commands\UpdateUserCommand;
use Domain\Models\UserModel;

interface UpdateUserUseCase
{
    public function execute(UpdateUserCommand $command): UserModel;
}
