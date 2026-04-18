<?php

declare(strict_types=1);

namespace Application\User\Ports\In;

use Application\User\Dto\Commands\LoginCommand;
use Domain\Models\UserModel;

interface LoginUseCase
{
    public function execute(LoginCommand $command): UserModel;
}
