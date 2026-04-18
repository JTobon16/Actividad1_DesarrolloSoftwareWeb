<?php

declare(strict_types=1);

namespace Application\EntradaCine\Services;

use Application\EntradaCine\Ports\In\DeleteEntradaCineUseCase;
use Application\EntradaCine\Ports\Out\DeleteEntradaCinePort;
use Application\EntradaCine\Ports\Out\GetEntradaCineByIdPort;
use Application\EntradaCine\Dto\Commands\DeleteEntradaCineCommand;
use Application\Mappers\EntradaCineApplicationMapper;

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
