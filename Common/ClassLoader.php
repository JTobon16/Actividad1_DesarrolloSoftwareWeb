<?php

declare(strict_types=1);

namespace Common;

class ClassLoader
{
    public static function register(): void
    {
        spl_autoload_register([self::class, 'autoload']);
    }

    public static function autoload(string $class): void
    {
        // 🔥 Ruta base del proyecto
        $baseDir = dirname(__DIR__);

        // 🔥 Convertir namespace a ruta real
        $file = $baseDir . '/' . str_replace('\\', '/', $class) . '.php';

        if (file_exists($file)) {
            require_once $file;
        }
    }
}
