<?php

declare(strict_types=1);

namespace Application\Ports\In;

use Application\Services\Dto\Commands\LoginCommand;
use Domain\Models\UserModel;

interface LoginUseCase
{
    public function execute(LoginCommand $command): UserModel;
}
