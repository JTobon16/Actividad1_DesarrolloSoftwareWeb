<?php

require_once __DIR__ . '/../Ports/In/GetUserByIdUseCase.php';
require_once __DIR__ . '/../Ports/Out/GetUserByIdPort.php';
require_once __DIR__ . '/Mappers/UserApplicationMapper.php';
require_once __DIR__ . '/../../Domain/Exceptions/UserNotFoundException.php';

class GetUserByIdService implements GetUserByIdUseCase
{
    public function __construct(
        private readonly GetUserByIdPort $getUserByIdPort
    ) {}

    public function execute(GetUserByIdQuery $query): array
    {
        $model = $this->getUserByIdPort->findById($query->getId());
        if ($model === null) {
            throw new UserNotFoundException($query->getId());
        }

        return UserApplicationMapper::fromModelToArray($model);
    }
}
