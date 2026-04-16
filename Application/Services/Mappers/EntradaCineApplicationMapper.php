<?php

declare(strict_types=1);

require_once __DIR__ . '/../Dto/Commands/CreateEntradaCineCommand.php';
require_once __DIR__ . '/../Dto/Commands/UpdateEntradaCineCommand.php';
require_once __DIR__ . '/../Dto/Commands/DeleteEntradaCineCommand.php';
require_once __DIR__ . '/../Dto/Queries/GetEntradaCineByIdQuery.php';

require_once __DIR__ . '/../../../Domain/Models/EntradaCineModel.php';

require_once __DIR__ . '/../../../Domain/ValueObjects/EntradaCineId.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/EntradaCineFecha.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/EntradaCineHora.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/EntradaCineValor.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/EntradaCinePelicula.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/EntradaCinePuesto.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/EntradaCineSala.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/EntradaCineCine.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/EntradaCinePais.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/EntradaCineDepartamento.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/EntradaCineCiudad.php';
require_once __DIR__ . '/../../../Domain/ValueObjects/EntradaCineCentroComercial.php';

final class EntradaCineApplicationMapper
{
    public static function fromCreateCommandToModel(CreateEntradaCineCommand $command): EntradaCineModel
    {
        return new EntradaCineModel(
            new EntradaCineId($command->getId()),
            new EntradaCineFecha($command->getFechaCompra()),
            new EntradaCineFecha($command->getFechaEntrada()),
            new EntradaCineHora($command->getHoraInicio()),
            new EntradaCineHora($command->getHoraFin()),
            new EntradaCineValor((float) $command->getValor()), // 🔥 CORRECCIÓN AQUÍ
            new EntradaCinePelicula($command->getPelicula()),
            new EntradaCinePuesto($command->getPuesto()),
            new EntradaCineSala($command->getSala()),
            $command->getGenero(), // ⚠️ cambiar a Enum si tu modelo lo requiere
            new EntradaCineCine($command->getCine()),
            new EntradaCinePais($command->getPais()),
            new EntradaCineDepartamento($command->getDepartamento()),
            new EntradaCineCiudad($command->getCiudad()),
            new EntradaCineCentroComercial($command->getCentroComercial())
        );
    }

    public static function fromUpdateCommandToModel(UpdateEntradaCineCommand $command): EntradaCineModel
    {
        return new EntradaCineModel(
            new EntradaCineId($command->getId()),
            new EntradaCineFecha($command->getFechaCompra()),
            new EntradaCineFecha($command->getFechaEntrada()),
            new EntradaCineHora($command->getHoraInicio()),
            new EntradaCineHora($command->getHoraFin()),
            new EntradaCineValor((float) $command->getValor()), // 🔥 CORRECCIÓN AQUÍ
            new EntradaCinePelicula($command->getPelicula()),
            new EntradaCinePuesto($command->getPuesto()),
            new EntradaCineSala($command->getSala()),
            $command->getGenero(), // ⚠️ cambiar a Enum si aplica
            new EntradaCineCine($command->getCine()),
            new EntradaCinePais($command->getPais()),
            new EntradaCineDepartamento($command->getDepartamento()),
            new EntradaCineCiudad($command->getCiudad()),
            new EntradaCineCentroComercial($command->getCentroComercial())
        );
    }

    public static function fromGetByIdQueryToId(GetEntradaCineByIdQuery $query): EntradaCineId
    {
        return new EntradaCineId($query->getId());
    }

    public static function fromDeleteCommandToId(DeleteEntradaCineCommand $command): EntradaCineId
    {
        return new EntradaCineId($command->getId());
    }

    public static function fromModelToArray(EntradaCineModel $entrada): array
    {
        return [
            'id'              => $entrada->id()->value(),
            'fechaCompra'     => $entrada->fechaCompra()->value(),
            'fechaEntrada'    => $entrada->fechaEntrada()->value(),
            'horaInicio'      => $entrada->horaInicio()->value(),
            'horaFin'         => $entrada->horaFin()->value(),
            'valor'           => $entrada->valor()->value(),
            'pelicula'        => $entrada->pelicula()->value(),
            'puesto'          => $entrada->puesto()->value(),
            'sala'            => $entrada->sala()->value(),
            'genero'          => $entrada->genero(),
            'cine'            => $entrada->cine()->value(),
            'pais'            => $entrada->pais()->value(),
            'departamento'    => $entrada->departamento()->value(),
            'ciudad'          => $entrada->ciudad()->value(),
            'centroComercial' => $entrada->centroComercial()->value(),
        ];
    }

    public static function fromModelsToArray(array $entradas): array
    {
        $result = [];

        foreach ($entradas as $entrada) {
            $result[] = self::fromModelToArray($entrada);
        }

        return $result;
    }
}
