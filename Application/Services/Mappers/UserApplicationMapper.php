<?php

declare(strict_types=1);

namespace Application\Services\Mappers;

use Application\Services\Dto\Commands\CreateUserCommand;
use Application\Services\Dto\Commands\UpdateUserCommand;
use Application\Services\Dto\Commands\DeleteUserCommand;
use Application\Services\Dto\Queries\GetUserByIdQuery;

use Domain\Models\UserModel;
use Domain\ValueObjects\UserId;
use Domain\ValueObjects\UserName;
use Domain\ValueObjects\UserEmail;
use Domain\ValueObjects\UserPassword;
use Domain\Enums\UserStatusEnum;

final class UserApplicationMapper
{
    public static function fromCreateCommandToModel(CreateUserCommand $command): UserModel
    {
        return new UserModel(
            new UserId($command->getId()),
            new UserName($command->getName()),
            new UserEmail($command->getEmail()),
            UserPassword::fromPlainText($command->getPassword()),
            $command->getRole(),
            UserStatusEnum::PENDING
        );
    }

    public static function fromUpdateCommandToModel(UpdateUserCommand $command): UserModel
    {
        return new UserModel(
            new UserId($command->getId()),
            new UserName($command->getName()),
            new UserEmail($command->getEmail()),
            UserPassword::fromPlainText($command->getPassword()),
            $command->getRole(),
            $command->getStatus()
        );
    }

    public static function fromGetUserByIdQueryToUserId(GetUserByIdQuery $query): UserId
    {
        return new UserId($query->getId());
    }

    public static function fromDeleteCommandToUserId(DeleteUserCommand $command): UserId
    {
        return new UserId($command->getId());
    }

    public static function fromModelToArray(UserModel $user): array
    {
        return $user->toArray();
    }

    public static function fromModelsToArray(array $users): array
    {
        return array_map(fn($u) => self::fromModelToArray($u), $users);
    }
}
