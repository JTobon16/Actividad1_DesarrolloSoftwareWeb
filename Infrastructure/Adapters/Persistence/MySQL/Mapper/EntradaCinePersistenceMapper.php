<?php

declare(strict_types=1);

namespace Infrastructure\Adapters\Persistence\MySQL\Mapper;

use Infrastructure\Adapters\Persistence\MySQL\Dto\EntradaCinePersistenceDto;
use Infrastructure\Adapters\Persistence\MySQL\Entity\EntradaCineEntity;
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

final class EntradaCinePersistenceMapper
{
    public function fromModelToDto(EntradaCineModel $entrada): EntradaCinePersistenceDto
    {
        return new EntradaCinePersistenceDto(
            $entrada->id()->value(),
            $entrada->fechaCompra()->value(),
            $entrada->fechaEntrada()->value(),
            $entrada->horaInicio()->value(),
            $entrada->horaFin()->value(),
            (string) $entrada->valor()->value(),
            $entrada->pelicula()->value(),
            $entrada->puesto()->value(),
            $entrada->sala()->value(),
            $entrada->genero(),
            $entrada->cine()->value(),
            $entrada->pais()->value(),
            $entrada->departamento()->value(),
            $entrada->ciudad()->value(),
            $entrada->centroComercial()->value()
        );
    }

    public function fromRowToEntity(array $row): EntradaCineEntity
    {
        return new EntradaCineEntity(
            (string) $row['id'],
            (string) $row['fechaCompra'],
            (string) $row['fechaEntrada'],
            (string) $row['horaInicio'],
            (string) $row['horaFin'],
            (string) $row['valor'],
            (string) $row['pelicula'],
            (string) $row['puesto'],
            (string) $row['sala'],
            (string) $row['genero'],
            (string) $row['cine'],
            (string) $row['pais'],
            (string) $row['departamento'],
            (string) $row['ciudad'],
            (string) $row['centroComercial'],
            isset($row['created_at']) ? (string) $row['created_at'] : null,
            isset($row['updated_at']) ? (string) $row['updated_at'] : null
        );
    }

    public function fromEntityToModel(EntradaCineEntity $entity): EntradaCineModel
    {
        return new EntradaCineModel(
            new EntradaCineId($entity->id()),
            new EntradaCineFecha($entity->fechaCompra()),
            new EntradaCineFecha($entity->fechaEntrada()),
            new EntradaCineHora($entity->horaInicio()),
            new EntradaCineHora($entity->horaFin()),
            new EntradaCineValor((float) $entity->valor()),
            new EntradaCinePelicula($entity->pelicula()),
            new EntradaCinePuesto($entity->puesto()),
            new EntradaCineSala($entity->sala()),
            $entity->genero(),
            new EntradaCineCine($entity->cine()),
            new EntradaCinePais($entity->pais()),
            new EntradaCineDepartamento($entity->departamento()),
            new EntradaCineCiudad($entity->ciudad()),
            new EntradaCineCentroComercial($entity->centroComercial())
        );
    }

    public function fromRowToModel(array $row): EntradaCineModel
    {
        return $this->fromEntityToModel($this->fromRowToEntity($row));
    }

    public function fromRowsToModels(array $rows): array
    {
        $models = [];
        foreach ($rows as $row) {
            $models[] = $this->fromRowToModel($row);
        }
        return $models;
    }
}
