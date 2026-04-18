<?php

declare(strict_types=1);

namespace Application\Services;

use Application\Ports\In\DeleteEntradaCineUseCase;
use Application\Ports\Out\DeleteEntradaCinePort;
use Application\Services\Dto\Commands\DeleteEntradaCineCommand;
use Domain\ValueObjects\EntradaCineId;

final class DeleteEntradaCineService implements DeleteEntradaCineUseCase
{
    public function __construct(
        private DeleteEntradaCinePort $deleteEntradaCinePort
    ) {}

    public function execute(DeleteEntradaCineCommand $command): void
    {
        $id = new EntradaCineId($command->getId());
        $this->deleteEntradaCinePort->delete($id);
    }
}
