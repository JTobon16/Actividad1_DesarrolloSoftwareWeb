<?php

declare(strict_types=1);

namespace Application\Services\Mappers;

use Application\Services\Dto\Commands\CreateEntradaCineCommand;
use Application\Services\Dto\Commands\UpdateEntradaCineCommand;
use Application\Services\Dto\Commands\DeleteEntradaCineCommand;
use Application\Services\Dto\Queries\GetEntradaCineByIdQuery;

use Domain\Models\EntradaCineModel;
use Domain\ValueObjects\EntradaCineId;
use Domain\ValueObjects\EntradaCineFecha;
use Domain\ValueObjects\EntradaCineHora;
use Domain\ValueObjects\EntradaCineValor;
use Domain\ValueObjects\EntradaCinePelicula;
use Domain\ValueObjects\EntradaCinePuesto;
use Domain\ValueObjects\EntradaCineSala;
use Domain\ValueObjects\EntradaCineCine;
use Domain\ValueObjects\EntradaCinePais;
use Domain\ValueObjects\EntradaCineDepartamento;
use Domain\ValueObjects\EntradaCineCiudad;
use Domain\ValueObjects\EntradaCineCentroComercial;

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
            new EntradaCineValor((float) $command->getValor()),
            new EntradaCinePelicula($command->getPelicula()),
            new EntradaCinePuesto($command->getPuesto()),
            new EntradaCineSala($command->getSala()),
            $command->getGenero(),
            new EntradaCineCine($command->getCine()),
            new EntradaCinePais($command->getPais()),
            new EntradaCineDepartamento($command->getDepartamento()),
            new EntradaCineCiudad($command->getCiudad()),
            new EntradaCineCentroComercial($command->getCentroComercial())
        );
    }

    public static function fromUpdateCommandToModel(UpdateEntradaCineCommand $command): EntradaCineModel
    {
        return self::fromUpdateCommandToModel($command);
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
        return $entrada->toArray();
    }

    public static function fromModelsToArray(array $entradas): array
    {
        return array_map(fn($e) => self::fromModelToArray($e), $entradas);
    }
}
