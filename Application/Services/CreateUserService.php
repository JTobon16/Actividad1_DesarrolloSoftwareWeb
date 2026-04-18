<?php

declare(strict_types=1);

namespace Application\User\Services;

use Application\User\Ports\In\CreateUserUseCase;
use Application\User\Ports\Out\SaveUserPort;
use Application\User\Ports\Out\GetUserByEmailPort;
use Application\User\Dto\Commands\CreateUserCommand;
use Application\Mappers\UserApplicationMapper;

use Domain\Models\UserModel;
use Domain\ValueObjects\UserEmail;
use Domain\Exceptions\UserAlreadyExistsException;

final class CreateUserService implements CreateUserUseCase
{
    public function __construct(
        private SaveUserPort $saveUserPort,
        private GetUserByEmailPort $getUserByEmailPort
    ) {}

    public function execute(CreateUserCommand $command): UserModel
    {
        $email = new UserEmail($command->getEmail());

        if ($this->getUserByEmailPort->getByEmail($email) !== null) {
            throw UserAlreadyExistsException::becauseEmailAlreadyExists($email->value());
        }

        $user = UserApplicationMapper::fromCreateCommandToModel($command);

        return $this->saveUserPort->save($user);
    }
}
