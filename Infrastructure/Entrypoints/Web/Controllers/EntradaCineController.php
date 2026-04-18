<?php

namespace Infrastructure\Entrypoints\Web\Controllers;

use Infrastructure\Entrypoints\Web\Mapper\EntradaCineWebMapper;
use Infrastructure\Entrypoints\Web\Dto\CreateEntradaCineRequest;
use Infrastructure\Entrypoints\Web\Dto\UpdateEntradaCineRequest;

use Application\Services\Dto\Queries\GetAllEntradasCineQuery;
use Application\Services\Dto\Queries\GetEntradaCineByIdQuery;
use Application\Services\Dto\Commands\DeleteEntradaCineCommand;

class EntradaCineController
{
    private $createUseCase;
    private $updateUseCase;
    private $getAllUseCase;
    private $getByIdUseCase;
    private $deleteUseCase;

    private EntradaCineWebMapper $mapper;
    // Constructor para inyectar los casos de uso
    public function __construct(
        $createUseCase,
        $updateUseCase,
        $getAllUseCase,
        $getByIdUseCase,
        $deleteUseCase
    ) {
        $this->createUseCase = $createUseCase;
        $this->updateUseCase = $updateUseCase;
        $this->getAllUseCase = $getAllUseCase;
        $this->getByIdUseCase = $getByIdUseCase;
        $this->deleteUseCase = $deleteUseCase;
        $this->mapper = new EntradaCineWebMapper();
    }
    // Método para listar todas las entradas de cine
    public function index(): array
    {
        $query = new GetAllEntradasCineQuery();
        return $this->getAllUseCase->execute($query);
    }
    // Nuevo método para mostrar los detalles de una entrada de cine
    public function show(string $id)
    {
        $query = new GetEntradaCineByIdQuery($id);
        return $this->getByIdUseCase->execute($query);
    }
    // Nuevo método para mostrar el formulario de creación
    public function store(CreateEntradaCineRequest $request)
    {
        $command = $this->mapper->fromCreateRequestToCommand($request);
        return $this->createUseCase->execute($command);
    }
    // Nuevo método para actualizar una entrada de cine
    public function update(UpdateEntradaCineRequest $request)
    {
        $command = $this->mapper->fromUpdateRequestToCommand($request);
        return $this->updateUseCase->execute($command);
    }

    // Nuevo método para eliminar una entrada de cine
    public function delete(string $id): void
    {
        $command = new DeleteEntradaCineCommand($id);
        $this->deleteUseCase->execute($command);
    }
}
