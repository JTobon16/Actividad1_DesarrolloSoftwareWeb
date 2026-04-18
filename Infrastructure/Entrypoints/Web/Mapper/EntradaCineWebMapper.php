<?php

namespace Infrastructure\Entrypoints\Web\Mapper;

use Infrastructure\Entrypoints\Web\Dto\CreateEntradaCineRequest;
use Infrastructure\Entrypoints\Web\Dto\UpdateEntradaCineRequest;
use Application\Services\Dto\Commands\CreateEntradaCineCommand;
use Application\Services\Dto\Commands\UpdateEntradaCineCommand;

class EntradaCineWebMapper
{
    public function fromCreateRequestToCommand(CreateEntradaCineRequest $request)
    {
        return new CreateEntradaCineCommand(
            $request->get('fechaCompra'),
            $request->get('fechaEntrada'),
            $request->get('horaInicio'),
            $request->get('horaFin'),
            $request->get('valor'),
            $request->get('pelicula'),
            $request->get('puesto'),
            $request->get('sala'),
            $request->get('genero'),
            $request->get('cine'),
            $request->get('pais'),
            $request->get('departamento'),
            $request->get('ciudad'),
            $request->get('centroComercial')
        );
    }

    public function fromUpdateRequestToCommand(UpdateEntradaCineRequest $request)
    {
        return new UpdateEntradaCineCommand(
            $request->getId(),
            $request->get('fechaCompra'),
            $request->get('fechaEntrada'),
            $request->get('horaInicio'),
            $request->get('horaFin'),
            $request->get('valor'),
            $request->get('pelicula'),
            $request->get('puesto'),
            $request->get('sala'),
            $request->get('genero'),
            $request->get('cine'),
            $request->get('pais'),
            $request->get('departamento'),
            $request->get('ciudad'),
            $request->get('centroComercial')
        );
    }
}
