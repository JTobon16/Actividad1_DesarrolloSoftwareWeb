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

    // ==========================
    // SUCCESS
    // ==========================

    public static function setSuccess(string $message): void
    {
        $_SESSION['_flash']['success'] = $message;
    }

    public static function success(): ?string
    {
        if (!isset($_SESSION['_flash']['success'])) {
            return null;
        }

        $message = $_SESSION['_flash']['success'];
        unset($_SESSION['_flash']['success']);

        return $message;
    }

    // ==========================
    // ERROR
    // ==========================

    public static function setError(string $message): void
    {
        $_SESSION['_flash']['error'] = $message;
    }

    public static function error(): ?string
    {
        if (!isset($_SESSION['_flash']['error'])) {
            return null;
        }

        $message = $_SESSION['_flash']['error'];
        unset($_SESSION['_flash']['error']);

        return $message;
    }
}
