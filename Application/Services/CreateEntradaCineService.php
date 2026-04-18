<?php

declare(strict_types=1);

namespace Application\Services;

use Application\Ports\In\CreateEntradaCineUseCase;
use Application\Ports\Out\SaveEntradaCinePort;
use Application\Ports\Out\GetEntradaCineByIdPort;
use Application\Services\Dto\Commands\CreateEntradaCineCommand;
use Application\Services\Mappers\EntradaCineApplicationMapper;

use Domain\Models\EntradaCineModel;
use Domain\ValueObjects\EntradaCineId;
use Domain\Exceptions\EntradaCineAlreadyExistsException;

final class CreateEntradaCineService implements CreateEntradaCineUseCase
{
    public function __construct(
        private SaveEntradaCinePort $saveEntradaCinePort,
        private GetEntradaCineByIdPort $getEntradaCineByIdPort
    ) {}

    public function execute(CreateEntradaCineCommand $command): EntradaCineModel
    {

        $id = EntradaCineId::generate();


        if ($this->getEntradaCineByIdPort->findById($id) !== null) {
            throw EntradaCineAlreadyExistsException::becauseEntradaAlreadyExists($id->value());
        }


        $entrada = EntradaCineApplicationMapper::fromCreateCommandToModel(
            $command,
            $id // 
        );


        return $this->saveEntradaCinePort->save($entrada);
    }
}
