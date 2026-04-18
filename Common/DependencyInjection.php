<?php

declare(strict_types=1);

namespace Common;

use Infrastructure\Entrypoints\Web\Controllers\EntradaCineController;

// Services
use Application\Services\CreateEntradaCineService;
use Application\Services\UpdateEntradaCineService;
use Application\Services\GetAllEntradasCineService;

//  Infraestructura REAL (TU ESTRUCTURA)
use Infrastructure\Adapters\Persistence\MySQL\Config\Connection;
use Infrastructure\Adapters\Persistence\MySQL\Repository\EntradaCineRepositoryMySQL;
use Infrastructure\Adapters\Persistence\MySQL\Mapper\EntradaCinePersistenceMapper;

class DependencyInjection
{
    //  Boot del sistema
    public static function boot(): void
    {
        ClassLoader::register();
    }


    //CONEXIÓN BD

    public static function getConnection(): Connection
    {
        return new Connection(
            '127.0.0.1',
            3306,
            'cine_db', // ⚠️ cambia si es diferente
            'root',
            ''
        );
    }

    public static function getPdo(): \PDO
    {
        return self::getConnection()->createPdo();
    }

    // MAPPER INFRA
    public static function getPersistenceMapper(): EntradaCinePersistenceMapper
    {
        return new EntradaCinePersistenceMapper();
    }

    //REPOSITORY

    public static function getEntradaCineRepository(): EntradaCineRepositoryMySQL
    {
        return new EntradaCineRepositoryMySQL(
            self::getPdo(),
            self::getPersistenceMapper()
        );
    }


    //USE CASES


    public static function getCreateEntradaCineUseCase(): CreateEntradaCineService
    {
        return new CreateEntradaCineService(
            self::getEntradaCineRepository(), // Save
            self::getEntradaCineRepository()  // GetById
        );
    }

    public static function getUpdateEntradaCineUseCase(): UpdateEntradaCineService
    {
        return new UpdateEntradaCineService(
            self::getEntradaCineRepository(),
            self::getEntradaCineRepository()
        );
    }

    public static function getGetAllEntradaCineUseCase(): GetAllEntradasCineService
    {
        return new GetAllEntradasCineService(
            self::getEntradaCineRepository()
        );
    }


    // CONTROLLER

    public static function getEntradaCineController(): EntradaCineController
    {
        return new EntradaCineController(
            self::getCreateEntradaCineUseCase(),
            self::getUpdateEntradaCineUseCase(),
            self::getGetAllEntradaCineUseCase()
        );
    }
}
