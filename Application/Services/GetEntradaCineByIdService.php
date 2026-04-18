<?php

declare(strict_types=1);

namespace Application\Services;


use Application\Ports\In\GetEntradaCineByIdUseCase;
use Application\Ports\Out\GetEntradaCineByIdPort;
use Application\Services\Dto\Queries\GetEntradaCineByIdQuery;
use Application\Services\Mappers\EntradaCineApplicationMapper;

use Domain\Models\EntradaCineModel;
use Domain\Exceptions\EntradaCineNotFoundException;

final class GetEntradaCineByIdService implements GetEntradaCineByIdUseCase
{
    public function __construct(
        private GetEntradaCineByIdPort $getEntradaCineByIdPort
    ) {}

    public function execute(GetEntradaCineByIdQuery $query): EntradaCineModel
    {
        $id = EntradaCineApplicationMapper::fromGetByIdQueryToId($query);

        $entrada = $this->getEntradaCineByIdPort->findById($id);

        if ($entrada === null) {
            throw EntradaCineNotFoundException::becauseIdWasNotFound($id->value());
        }

        return $entrada;
    }
}
