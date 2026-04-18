<?php

declare(strict_types=1);

namespace Application\User\Services;

use Application\Ports\In\DeleteUserUseCase;
use Application\Ports\Out\DeleteUserPort;
use Application\Ports\Out\GetUserByIdPort;
use Application\Services\Dto\Commands\DeleteUserCommand;
use Application\Services\Mappers\UserApplicationMapper;

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
