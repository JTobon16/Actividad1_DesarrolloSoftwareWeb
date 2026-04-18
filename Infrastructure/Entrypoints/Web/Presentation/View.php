<?php

namespace Infrastructure\Entrypoints\Web\Presentation;

class View
{
    public static function render(string $template, array $data = [])
    {
        extract($data);
        require __DIR__ . "/Views/$template.php";
    }

    public static function redirect(string $route)
    {
        header("Location: ?route=$route");
        exit;
    }
}
