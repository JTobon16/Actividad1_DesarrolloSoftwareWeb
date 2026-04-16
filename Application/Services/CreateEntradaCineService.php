<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/CreateEntradaCineUseCase.php';
require_once __DIR__ . '/../Ports/Out/SaveEntradaCinePort.php';
require_once __DIR__ . '/../Ports/Out/GetEntradaCineByIdPort.php';
require_once __DIR__ . '/../Dto/Commands/CreateEntradaCineCommand.php';
require_once __DIR__ . '/Mappers/EntradaCineApplicationMapper.php';

require_once __DIR__ . '/../../Domain/Models/EntradaCineModel.php';
require_once __DIR__ . '/../../Domain/ValueObjects/EntradaCineId.php';
require_once __DIR__ . '/../../Domain/Exceptions/EntradaCineAlreadyExistsException.php';

final class CreateEntradaCineService implements CreateEntradaCineUseCase
{
    private SaveEntradaCinePort $saveEntradaCinePort;
    private GetEntradaCineByIdPort $getEntradaCineByIdPort;

    public function __construct(
        SaveEntradaCinePort $saveEntradaCinePort,
        GetEntradaCineByIdPort $getEntradaCineByIdPort
    ) {
        $this->saveEntradaCinePort = $saveEntradaCinePort;
        $this->getEntradaCineByIdPort = $getEntradaCineByIdPort;
    }

    public function execute(CreateEntradaCineCommand $command): EntradaCineModel
    {
        $id = new EntradaCineId($command->getId());

        $existingEntrada = $this->getEntradaCineByIdPort->findById($id);

        if ($existingEntrada !== null) {
            throw EntradaCineAlreadyExistsException::becauseEntradaAlreadyExists(
                $id->value()
            );
        }

        $entrada = EntradaCineApplicationMapper::fromCreateCommandToModel($command);

        return $this->saveEntradaCinePort->save($entrada);
    }
}
