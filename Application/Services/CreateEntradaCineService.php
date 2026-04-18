<?php

declare(strict_types=1);

namespace Application\EntradaCine\Services;

use Application\EntradaCine\Ports\In\CreateEntradaCineUseCase;
use Application\EntradaCine\Ports\Out\SaveEntradaCinePort;
use Application\EntradaCine\Ports\Out\GetEntradaCineByIdPort;
use Application\EntradaCine\Dto\Commands\CreateEntradaCineCommand;
use Application\Mappers\EntradaCineApplicationMapper;

use Domain\Models\EntradaCineModel;
use Domain\ValueObjects\EntradaCineId;
use Domain\Exceptions\EntradaCineAlreadyExistsException;

final class CreateEntradaCineService implements CreateEntradaCineUseCase
{
    public function __construct(
        private SaveEntradaCinePort $saveEntradaCinePort,
        private GetEntradaCineByIdPort $getEntradaCineByIdPort
    ) {}

    public function execute(CreateEntradaCineCommand $command): EntradaCineModel
    {
        $id = new EntradaCineId($command->getId());

        if ($this->getEntradaCineByIdPort->findById($id) !== null) {
            throw EntradaCineAlreadyExistsException::becauseEntradaAlreadyExists($id->value());
        }

        $entrada = EntradaCineApplicationMapper::fromCreateCommandToModel($command);

        return $this->saveEntradaCinePort->save($entrada);
    }
}
