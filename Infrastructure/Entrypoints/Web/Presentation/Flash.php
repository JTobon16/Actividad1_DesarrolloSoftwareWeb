<?php

namespace Infrastructure\Entrypoints\Web\Presentation;

class Flash
{
    public static function start()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function setSuccess(string $msg)
    {
        $_SESSION['success'] = $msg;
    }

    public static function success()
    {
        return $_SESSION['success'] ?? null;
    }
}
