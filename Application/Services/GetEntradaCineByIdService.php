<?php

declare(strict_types=1);

namespace Application\Services;

use Application\Ports\In\GetEntradaCineByIdUseCase;
use Application\Ports\Out\GetEntradaCineByIdPort;
use Application\Services\Dto\Queries\GetEntradaCineByIdQuery;
use Domain\ValueObjects\EntradaCineId;

final class GetEntradaCineByIdService implements GetEntradaCineByIdUseCase
{
    public function __construct(
        private GetEntradaCineByIdPort $getEntradaCineByIdPort
    ) {}

    public function execute(GetEntradaCineByIdQuery $query)
    {
        $id = new EntradaCineId($query->getId());

        return $this->getEntradaCineByIdPort->findById($id);
    }
}
