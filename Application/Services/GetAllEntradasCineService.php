<?php

declare(strict_types=1);

require_once __DIR__ . '/../Ports/In/GetAllEntradasCineUseCase.php';
require_once __DIR__ . '/../Ports/Out/GetAllEntradasCinePort.php';

final class GetAllEntradasCineService implements GetAllEntradasCineUseCase
{
    private GetAllEntradasCinePort $getAllEntradasCinePort;

    public function __construct(GetAllEntradasCinePort $getAllEntradasCinePort)
    {
        $this->getAllEntradasCinePort = $getAllEntradasCinePort;
    }

    public function execute(GetAllEntradasCineQuery $query): array
    {
        return $this->getAllEntradasCinePort->getAll();
    }
}
