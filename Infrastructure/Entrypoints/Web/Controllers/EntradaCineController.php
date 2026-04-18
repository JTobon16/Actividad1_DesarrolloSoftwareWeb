<?php

namespace Infrastructure\Entrypoints\Web\Controllers;

use Infrastructure\Entrypoints\Web\Mapper\EntradaCineWebMapper;
use Infrastructure\Entrypoints\Web\Dto\CreateEntradaCineRequest;
use Infrastructure\Entrypoints\Web\Dto\UpdateEntradaCineRequest;

class EntradaCineController
{
    private $createUseCase;
    private $updateUseCase;
    private $getAllUseCase;

    private EntradaCineWebMapper $mapper;

    public function __construct(
        $createUseCase,
        $updateUseCase,
        $getAllUseCase
    ) {
        $this->createUseCase = $createUseCase;
        $this->updateUseCase = $updateUseCase;
        $this->getAllUseCase = $getAllUseCase;
        $this->mapper = new EntradaCineWebMapper();
    }

    public function index()
    {
        return $this->getAllUseCase->execute();
    }

    public function store(CreateEntradaCineRequest $request)
    {
        $command = $this->mapper->fromCreateRequestToCommand($request);
        return $this->createUseCase->execute($command);
    }

    public function update(UpdateEntradaCineRequest $request)
    {
        $command = $this->mapper->fromUpdateRequestToCommand($request);
        return $this->updateUseCase->execute($command);
    }
}
