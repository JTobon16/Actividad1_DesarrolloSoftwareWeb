<?php

declare(strict_types=1);

namespace Application\User\Services;

use Application\User\Ports\In\UpdateUserUseCase;
use Application\User\Ports\Out\UpdateUserPort;
use Application\User\Ports\Out\GetUserByIdPort;
use Application\User\Ports\Out\GetUserByEmailPort;
use Application\User\Dto\Commands\UpdateUserCommand;

use Domain\Models\UserModel;
use Domain\ValueObjects\UserId;
use Domain\ValueObjects\UserEmail;
use Domain\ValueObjects\UserPassword;
use Domain\ValueObjects\UserName;
use Domain\Exceptions\UserNotFoundException;
use Domain\Exceptions\UserAlreadyExistsException;

final class UpdateUserService implements UpdateUserUseCase
{
    public function __construct(
        private UpdateUserPort $updateUserPort,
        private GetUserByIdPort $getUserByIdPort,
        private GetUserByEmailPort $getUserByEmailPort
    ) {}

    public function execute(UpdateUserCommand $command): UserModel
    {
        $userId = new UserId($command->getId());

        $currentUser = $this->getUserByIdPort->findById($userId);

        if ($currentUser === null) {
            throw UserNotFoundException::becauseIdWasNotFound($userId->value());
        }

        $newEmail = new UserEmail($command->getEmail());

        $userWithSameEmail = $this->getUserByEmailPort->getByEmail($newEmail);

        if ($userWithSameEmail !== null && !$userWithSameEmail->id()->value() === $userId->value()) {
            throw UserAlreadyExistsException::becauseEmailAlreadyExists($newEmail->value());
        }

        $password = ($command->getPassword() !== '')
            ? UserPassword::fromPlainText($command->getPassword())
            : $currentUser->password();

        $userToUpdate = new UserModel(
            $userId,
            new UserName($command->getName()),
            $newEmail,
            $password,
            $command->getRole(),
            $command->getStatus()
        );

        return $this->updateUserPort->update($userToUpdate);
    }
}
