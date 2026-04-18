<?php

declare(strict_types=1);

namespace Application\User\Services;

use Application\User\Ports\In\GetUserByIdUseCase;
use Application\User\Ports\Out\GetUserByIdPort;
use Application\User\Dto\Queries\GetUserByIdQuery;
use Application\Mappers\UserApplicationMapper;

use Domain\Models\UserModel;
use Domain\Exceptions\UserNotFoundException;

final class GetUserByIdService implements GetUserByIdUseCase
{
    public function __construct(
        private GetUserByIdPort $getUserByIdPort
    ) {}

    public function execute(GetUserByIdQuery $query): UserModel
    {
        $userId = UserApplicationMapper::fromGetUserByIdQueryToUserId($query);

        $user = $this->getUserByIdPort->findById($userId);

        if ($user === null) {
            throw UserNotFoundException::becauseIdWasNotFound($userId->value());
        }

        return $user;
    }
}
