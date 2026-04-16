<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/DeleteEntradaCineUseCase.php';
require_once __DIR__ . '/../Ports/Out/DeleteEntradaCinePort.php';
require_once __DIR__ . '/../Ports/Out/GetEntradaCineByIdPort.php';
require_once __DIR__ . '/Mappers/EntradaCineApplicationMapper.php';
require_once __DIR__ . '/../../Domain/Exceptions/EntradaCineNotFoundException.php';

final class DeleteEntradaCineService implements DeleteEntradaCineUseCase
{
    private DeleteEntradaCinePort  $deleteEntradaCinePort;
    private GetEntradaCineByIdPort $getEntradaCineByIdPort;

    public function __construct(
        DeleteEntradaCinePort  $deleteEntradaCinePort,
        GetEntradaCineByIdPort $getEntradaCineByIdPort
    ) {
        $this->deleteEntradaCinePort  = $deleteEntradaCinePort;
        $this->getEntradaCineByIdPort = $getEntradaCineByIdPort;
    }

    public function execute(DeleteEntradaCineCommand $command): void
    {
        $id              = EntradaCineApplicationMapper::fromDeleteCommandToId($command);
        $existingEntrada = $this->getEntradaCineByIdPort->getById($id);

        if ($existingEntrada === null) {
            throw EntradaCineNotFoundException::becauseIdWasNotFound($id->value());
        }

        $this->deleteEntradaCinePort->delete($id);
    }
}
