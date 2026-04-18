<?php

declare(strict_types=1);

namespace Application\EntradaCine\Services;

use Application\Ports\In\DeleteEntradaCineUseCase;
use Application\Ports\Out\DeleteEntradaCinePort;
use Application\Ports\Out\GetEntradaCineByIdPort;
use Application\Services\Dto\Commands\DeleteEntradaCineCommand;
use Application\Services\Mappers\EntradaCineApplicationMapper;

use Domain\Exceptions\EntradaCineNotFoundException;

final class DeleteEntradaCineService implements DeleteEntradaCineUseCase
{
    public function __construct(
        private DeleteEntradaCinePort $deleteEntradaCinePort,
        private GetEntradaCineByIdPort $getEntradaCineByIdPort
    ) {}

    public function execute(DeleteEntradaCineCommand $command): void
    {
        $id = EntradaCineApplicationMapper::fromDeleteCommandToId($command);

        if ($this->getEntradaCineByIdPort->findById($id) === null) {
            throw EntradaCineNotFoundException::becauseIdWasNotFound($id->value());
        }

        $this->deleteEntradaCinePort->delete($id);
    }
}
