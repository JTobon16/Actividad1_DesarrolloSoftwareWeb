<?php

require_once __DIR__ . '/../Exceptions/InvalidEntradaCineGeneroException.php';

class GeneroEnum
{
    const ACCION      = 'ACCION';
    const COMEDIA      = 'COMEDIA';
    const DRAMA        = 'DRAMA';
    const TERROR       = 'TERROR';
    const CIENCIA_FICCION = 'CIENCIA_FICCION';
    const ANIMACION    = 'ANIMACION';
    const ROMANCE      = 'ROMANCE';
    const THRILLER     = 'THRILLER';
    const DOCUMENTAL   = 'DOCUMENTAL';
    const FANTASIA     = 'FANTASIA';

    public static function values(): array
    {
        return [
            self::ACCION,
            self::COMEDIA,
            self::DRAMA,
            self::TERROR,
            self::CIENCIA_FICCION,
            self::ANIMACION,
            self::ROMANCE,
            self::THRILLER,
            self::DOCUMENTAL,
            self::FANTASIA,
        ];
    }

    public static function isValid(string $value): bool
    {
        return in_array($value, self::values(), true);
    }

    public static function ensureIsValid(string $value): void
    {
        if (!self::isValid($value)) {
            throw InvalidEntradaCineGeneroException::becauseValueIsInvalid($value);
        }
    }
}
