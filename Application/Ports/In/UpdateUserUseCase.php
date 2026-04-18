<?php

declare(strict_types=1);

namespace Application\Ports\In;

use Application\Services\Dto\Commands\UpdateUserCommand;
use Domain\Models\UserModel;

interface UpdateUserUseCase
{
    public function execute(UpdateUserCommand $command): UserModel;
}
