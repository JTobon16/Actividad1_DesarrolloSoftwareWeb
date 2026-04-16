<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/UpdateEntradaCineUseCase.php';
require_once __DIR__ . '/../Ports/Out/UpdateEntradaCinePort.php';
require_once __DIR__ . '/../Ports/Out/GetEntradaCineByIdPort.php';
require_once __DIR__ . '/Mappers/EntradaCineApplicationMapper.php';
require_once __DIR__ . '/../../Domain/Exceptions/EntradaCineNotFoundException.php';
require_once __DIR__ . '/../../Domain/ValueObjects/EntradaCineId.php';

final class UpdateEntradaCineService implements UpdateEntradaCineUseCase
{
    private UpdateEntradaCinePort  $updateEntradaCinePort;
    private GetEntradaCineByIdPort $getEntradaCineByIdPort;

    public function __construct(
        UpdateEntradaCinePort  $updateEntradaCinePort,
        GetEntradaCineByIdPort $getEntradaCineByIdPort
    ) {
        $this->updateEntradaCinePort  = $updateEntradaCinePort;
        $this->getEntradaCineByIdPort = $getEntradaCineByIdPort;
    }

    public function execute(UpdateEntradaCineCommand $command): EntradaCineModel
    {
        $id              = new EntradaCineId($command->getId());
        $existingEntrada = $this->getEntradaCineByIdPort->getById($id);

        if ($existingEntrada === null) {
            throw EntradaCineNotFoundException::becauseIdWasNotFound($id->value());
        }

        $entrada = EntradaCineApplicationMapper::fromUpdateCommandToModel($command);
        return $this->updateEntradaCinePort->update($entrada);
    }
}
