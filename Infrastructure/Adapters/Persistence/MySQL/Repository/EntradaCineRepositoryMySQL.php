<?php

declare(strict_types=1);

namespace Infrastructure\Adapters\Persistence\MySQL\Repository;

use PDO;
use RuntimeException;
use Application\Ports\Out\SaveEntradaCinePort;
use Application\Ports\Out\UpdateEntradaCinePort;
use Application\Ports\Out\DeleteEntradaCinePort;
use Application\Ports\Out\GetEntradaCineByIdPort;
use Application\Ports\Out\GetAllEntradasCinePort;
use Infrastructure\Adapters\Persistence\MySQL\Mapper\EntradaCinePersistenceMapper;
use Domain\Models\EntradaCineModel;
use Domain\ValueObjects\EntradaCineId;

final class EntradaCineRepositoryMySQL implements
    SaveEntradaCinePort,
    UpdateEntradaCinePort,
    DeleteEntradaCinePort,
    GetEntradaCineByIdPort,
    GetAllEntradasCinePort
{
    private PDO $pdo;
    private EntradaCinePersistenceMapper $mapper;

    public function __construct(PDO $pdo, EntradaCinePersistenceMapper $mapper)
    {
        $this->pdo = $pdo;
        $this->mapper = $mapper;
    }

    public function save(EntradaCineModel $entrada): EntradaCineModel
    {
        $dto = $this->mapper->fromModelToDto($entrada);

        $sql = '
            INSERT INTO entrada_cine (
                id, fechaCompra, fechaEntrada, horaInicio, horaFin,
                valor, pelicula, puesto, sala, genero, cine,
                pais, departamento, ciudad, centroComercial,
                createdAt, updatedAt
            ) VALUES (
                :id, :fechaCompra, :fechaEntrada, :horaInicio, :horaFin,
                :valor, :pelicula, :puesto, :sala, :genero, :cine,
                :pais, :departamento, :ciudad, :centroComercial,
                NOW(), NOW()
            )
        ';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $dto->id(),
            ':fechaCompra' => $dto->fechaCompra(),
            ':fechaEntrada' => $dto->fechaEntrada(),
            ':horaInicio' => $dto->horaInicio(),
            ':horaFin' => $dto->horaFin(),
            ':valor' => $dto->valor(),
            ':pelicula' => $dto->pelicula(),
            ':puesto' => $dto->puesto(),
            ':sala' => $dto->sala(),
            ':genero' => $dto->genero(),
            ':cine' => $dto->cine(),
            ':pais' => $dto->pais(),
            ':departamento' => $dto->departamento(),
            ':ciudad' => $dto->ciudad(),
            ':centroComercial' => $dto->centroComercial(),
        ]);

        // 🔥 CORREGIDO: usar findById
        $saved = $this->findById(new EntradaCineId($dto->id()));

        if ($saved === null) {
            throw new RuntimeException('No se pudo recuperar la entrada después de guardarla.');
        }

        return $saved;
    }

    public function update(EntradaCineModel $entrada): EntradaCineModel
    {
        $dto = $this->mapper->fromModelToDto($entrada);

        $sql = '
            UPDATE entrada_cine
            SET fechaCompra = :fechaCompra, fechaEntrada = :fechaEntrada,
                horaInicio = :horaInicio, horaFin = :horaFin,
                valor = :valor, pelicula = :pelicula, puesto = :puesto,
                sala = :sala, genero = :genero, cine = :cine,
                pais = :pais, departamento = :departamento,
                ciudad = :ciudad, centroComercial = :centroComercial,
                updatedAt = NOW()
            WHERE id = :id
        ';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $dto->id(),
            ':fechaCompra' => $dto->fechaCompra(),
            ':fechaEntrada' => $dto->fechaEntrada(),
            ':horaInicio' => $dto->horaInicio(),
            ':horaFin' => $dto->horaFin(),
            ':valor' => $dto->valor(),
            ':pelicula' => $dto->pelicula(),
            ':puesto' => $dto->puesto(),
            ':sala' => $dto->sala(),
            ':genero' => $dto->genero(),
            ':cine' => $dto->cine(),
            ':pais' => $dto->pais(),
            ':departamento' => $dto->departamento(),
            ':ciudad' => $dto->ciudad(),
            ':centroComercial' => $dto->centroComercial(),
        ]);

        $updated = $this->findById(new EntradaCineId($dto->id()));

        if ($updated === null) {
            throw new RuntimeException('No se pudo recuperar la entrada después de actualizarla.');
        }

        return $updated;
    }

    // 🔥 NOMBRE CORRECTO
    public function findById(EntradaCineId $id): ?EntradaCineModel
    {
        $sql = 'SELECT * FROM entrada_cine WHERE id = :id LIMIT 1';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id->value()]);

        $row = $stmt->fetch();

        return $row === false ? null : $this->mapper->fromRowToModel($row);
    }

    public function findAll(): array
    {
        $sql = 'SELECT * FROM entrada_cine ORDER BY fechaEntrada DESC';
        $stmt = $this->pdo->query($sql);

        $rows = $stmt->fetchAll();

        return $this->mapper->fromRowsToModels($rows);
    }

    public function delete(EntradaCineId $id): void
    {
        $sql = 'DELETE FROM entrada_cine WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id->value()]);
    }
}
