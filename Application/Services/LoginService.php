<?php

declare(strict_types=1);

namespace Application\User\Services;

use Application\Ports\In\LoginUseCase;
use Application\Ports\Out\GetUserByEmailPort;
use Application\Services\Dto\Commands\LoginCommand;

use Domain\Models\UserModel;
use Domain\ValueObjects\UserEmail;
use Domain\Enums\UserStatusEnum;
use Domain\Exceptions\InvalidCredentialsException;

final class LoginService implements LoginUseCase
{
    public function __construct(
        private GetUserByEmailPort $getUserByEmailPort
    ) {}

    public function execute(LoginCommand $command): UserModel
    {
        $email = new UserEmail($command->getEmail());

        $user = $this->getUserByEmailPort->FindByEmail($email);

        if ($user === null || !$user->password()->verifyPlain($command->getPassword())) {
            throw InvalidCredentialsException::becauseCredentialsAreInvalid();
        }

        if ($user->status() !== UserStatusEnum::ACTIVE) {
            throw InvalidCredentialsException::becauseUserIsNotActive();
        }

        return $user;
    }
}
