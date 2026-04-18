<?php

declare(strict_types=1);

namespace Common;

use Infrastructure\Entrypoints\Web\Controllers\EntradaCineController;

// Services
use Application\Services\CreateEntradaCineService;
use Application\Services\UpdateEntradaCineService;
use Application\Services\GetAllEntradasCineService;
use Application\Services\GetEntradaCineByIdService;
use Application\Services\DeleteEntradaCineService;

// Infra
use Infrastructure\Adapters\Persistence\MySQL\Config\Connection;
use Infrastructure\Adapters\Persistence\MySQL\Repository\EntradaCineRepositoryMySQL;
use Infrastructure\Adapters\Persistence\MySQL\Mapper\EntradaCinePersistenceMapper;

// CARGA AUTOMÁTICA DE CLASES
class DependencyInjection
{
    public static function boot(): void
    {
        ClassLoader::register();
    }

    public static function getConnection(): Connection
    {
        return new Connection(
            '127.0.0.1',
            3306,
            'cine_db',
            'root',
            ''
        );
    }
    // REPOSITORIES
    public static function getPdo(): \PDO
    {
        return self::getConnection()->createPdo();
    }
    // MAPPER
    public static function getPersistenceMapper(): EntradaCinePersistenceMapper
    {
        return new EntradaCinePersistenceMapper();
    }
    // REPOSITORY
    public static function getEntradaCineRepository(): EntradaCineRepositoryMySQL
    {
        return new EntradaCineRepositoryMySQL(
            self::getPdo(),
            self::getPersistenceMapper()
        );
    }

    // USE CASES
    public static function getCreateEntradaCineUseCase(): CreateEntradaCineService
    {
        return new CreateEntradaCineService(
            self::getEntradaCineRepository(),
            self::getEntradaCineRepository()
        );
    }
    // NUEVO UPDATE
    public static function getUpdateEntradaCineUseCase(): UpdateEntradaCineService
    {
        return new UpdateEntradaCineService(
            self::getEntradaCineRepository(),
            self::getEntradaCineRepository()
        );
    }
    //  NUEVO GET ALL
    public static function getGetAllEntradaCineUseCase(): GetAllEntradasCineService
    {
        return new GetAllEntradasCineService(
            self::getEntradaCineRepository()
        );
    }
    // NUEVO GET BY ID
    public static function getGetEntradaCineByIdUseCase(): GetEntradaCineByIdService
    {
        return new GetEntradaCineByIdService(
            self::getEntradaCineRepository()
        );
    }

    //  NUEVO DELETE
    public static function getDeleteEntradaCineUseCase(): DeleteEntradaCineService
    {
        return new DeleteEntradaCineService(
            self::getEntradaCineRepository()
        );
    }

    // CONTROLLER
    public static function getEntradaCineController(): EntradaCineController
    {
        return new EntradaCineController(
            self::getCreateEntradaCineUseCase(),
            self::getUpdateEntradaCineUseCase(),
            self::getGetAllEntradaCineUseCase(),
            self::getGetEntradaCineByIdUseCase(),
            self::getDeleteEntradaCineUseCase()
        );
    }
}
