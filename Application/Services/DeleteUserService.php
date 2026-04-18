<?php

declare(strict_types=1);

namespace Application\User\Services;

use Application\User\Ports\In\DeleteUserUseCase;
use Application\User\Ports\Out\DeleteUserPort;
use Application\User\Ports\Out\GetUserByIdPort;
use Application\User\Dto\Commands\DeleteUserCommand;
use Application\Mappers\UserApplicationMapper;

use Domain\Exceptions\UserNotFoundException;

final class DeleteUserService implements DeleteUserUseCase
{
    public function __construct(
        private DeleteUserPort $deleteUserPort,
        private GetUserByIdPort $getUserByIdPort
    ) {}

    public function execute(DeleteUserCommand $command): void
    {
        $userId = UserApplicationMapper::fromDeleteCommandToUserId($command);

        if ($this->getUserByIdPort->findById($userId) === null) {
            throw UserNotFoundException::becauseIdWasNotFound($userId->value());
        }

        $this->deleteUserPort->delete($userId);
    }
}
