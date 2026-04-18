<?php

declare(strict_types=1);

namespace Application\User\Services;

use Application\Ports\In\CreateUserUseCase;
use Application\Ports\Out\SaveUserPort;
use Application\Ports\Out\GetUserByEmailPort;
use Application\Services\Dto\Commands\CreateUserCommand;
use Application\Services\Mappers\UserApplicationMapper;

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

        if ($this->getUserByEmailPort->FindByEmail($email) !== null) {
            throw UserAlreadyExistsException::becauseEmailAlreadyExists($email->value());
        }

        $user = UserApplicationMapper::fromCreateCommandToModel($command);

        return $this->saveUserPort->save($user);
    }
}
