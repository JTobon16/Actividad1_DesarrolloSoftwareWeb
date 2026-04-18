<?php

declare(strict_types=1);

namespace Application\Services;

use Application\Ports\In\UpdateEntradaCineUseCase;
use Application\Ports\Out\UpdateEntradaCinePort;
use Application\Ports\Out\GetEntradaCineByIdPort;
use Application\Services\Dto\Commands\UpdateEntradaCineCommand;
use Application\Services\Mappers\EntradaCineApplicationMapper;

use Domain\Models\EntradaCineModel;
use Domain\ValueObjects\EntradaCineId;
use Domain\Exceptions\EntradaCineNotFoundException;

final class UpdateEntradaCineService implements UpdateEntradaCineUseCase
{
    public function __construct(
        private UpdateEntradaCinePort $updateEntradaCinePort,
        private GetEntradaCineByIdPort $getEntradaCineByIdPort
    ) {}

    public function execute(UpdateEntradaCineCommand $command): EntradaCineModel
    {
        $id = new EntradaCineId($command->getId());

        $existingEntrada = $this->getEntradaCineByIdPort->findById($id);

        if ($existingEntrada === null) {
            throw EntradaCineNotFoundException::becauseIdWasNotFound($id->value());
        }

        $entrada = EntradaCineApplicationMapper::fromUpdateCommandToModel($command);

        return $this->updateEntradaCinePort->update($entrada);
    }
}
