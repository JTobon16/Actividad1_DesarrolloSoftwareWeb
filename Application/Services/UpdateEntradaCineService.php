<?php

declare(strict_types=1);

namespace Application\EntradaCine\Services;

use Application\EntradaCine\Ports\In\UpdateEntradaCineUseCase;
use Application\EntradaCine\Ports\Out\UpdateEntradaCinePort;
use Application\EntradaCine\Ports\Out\GetEntradaCineByIdPort;
use Application\EntradaCine\Dto\Commands\UpdateEntradaCineCommand;
use Application\Mappers\EntradaCineApplicationMapper;

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
