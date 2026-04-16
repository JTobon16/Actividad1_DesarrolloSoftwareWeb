<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/GetEntradaCineByIdUseCase.php';
require_once __DIR__ . '/../Ports/Out/GetEntradaCineByIdPort.php';
require_once __DIR__ . '/Mappers/EntradaCineApplicationMapper.php';
require_once __DIR__ . '/../../Domain/Exceptions/EntradaCineNotFoundException.php';

final class GetEntradaCineByIdService implements GetEntradaCineByIdUseCase
{
    private GetEntradaCineByIdPort $getEntradaCineByIdPort;

    public function __construct(GetEntradaCineByIdPort $getEntradaCineByIdPort)
    {
        $this->getEntradaCineByIdPort = $getEntradaCineByIdPort;
    }

    public function execute(GetEntradaCineByIdQuery $query): EntradaCineModel
    {
        $id     = EntradaCineApplicationMapper::fromGetByIdQueryToId($query);
        $entrada = $this->getEntradaCineByIdPort->getById($id);

        if ($entrada === null) {
            throw EntradaCineNotFoundException::becauseIdWasNotFound($id->value());
        }

        return $entrada;
    }
}
