<?php

namespace Infrastructure\Entrypoints\Web\Presentation;

class View
{
    public static function render(string $view, array $data = [])
    {

        extract($data);

        $path = __DIR__ . "/Views/$view.php";


        if (!file_exists($path)) {
            throw new \Exception("Vista no encontrada: " . $path);
        }

        require $path;
    }

    public static function redirect(string $route)
    {
        header("Location: ?route=$route");
        exit;
    }
}
