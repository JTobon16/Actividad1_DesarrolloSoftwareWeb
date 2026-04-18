<?php

declare(strict_types=1);

namespace Application\Services;

use Application\Ports\In\GetUserByIdUseCase;
use Application\Ports\Out\GetUserByIdPort;
use Application\Services\Dto\Queries\GetUserByIdQuery;
use Application\Services\Mappers\UserApplicationMapper;

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
