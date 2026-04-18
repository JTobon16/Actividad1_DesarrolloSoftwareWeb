<?php

declare(strict_types=1);

namespace Infrastructure\Adapters\Persistence\MySQL\Mapper;

use Domain\Models\EntradaCineModel;
use Infrastructure\Adapters\Persistence\MySQL\Dto\EntradaCinePersistenceDto;
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

final class EntradaCinePersistenceMapper
{
    // 🔄 Model → DTO
    public function fromModelToDto(EntradaCineModel $model): EntradaCinePersistenceDto
    {
        return new EntradaCinePersistenceDto(
            (string) $model->id()->value(),
            (string) $model->fechaCompra()->value(),
            (string) $model->fechaEntrada()->value(),
            (string) $model->horaInicio()->value(),
            (string) $model->horaFin()->value(),
            (string) $model->valor()->value(), // 🔥 FORZADO A STRING
            (string) $model->pelicula()->value(),
            (string) $model->puesto()->value(),
            (string) $model->sala()->value(),
            (string) $model->genero(),
            (string) $model->cine()->value(),
            (string) $model->pais()->value(),
            (string) $model->departamento()->value(),
            (string) $model->ciudad()->value(),
            (string) $model->centroComercial()->value()
        );
    }

    // 🔄 Row (BD) → Model
    public function fromRowToModel(array $row): EntradaCineModel
    {
        return new EntradaCineModel(
            new EntradaCineId($row['id']),
            new EntradaCineFecha($row['fechaCompra']),
            new EntradaCineFecha($row['fechaEntrada']),
            new EntradaCineHora($row['horaInicio']),
            new EntradaCineHora($row['horaFin']),
            new EntradaCineValor($row['valor']), // 🔥 CORREGIDO (SIN float)
            new EntradaCinePelicula($row['pelicula']),
            new EntradaCinePuesto($row['puesto']),
            new EntradaCineSala($row['sala']),
            $row['genero'],
            new EntradaCineCine($row['cine']),
            new EntradaCinePais($row['pais']),
            new EntradaCineDepartamento($row['departamento']),
            new EntradaCineCiudad($row['ciudad']),
            new EntradaCineCentroComercial($row['centroComercial'])
        );
    }

    // 🔄 Múltiples registros
    public function fromRowsToModels(array $rows): array
    {
        return array_map(fn($row) => $this->fromRowToModel($row), $rows);
    }
}
