<?php

declare(strict_types=1);

namespace Domain\Enums;

use Domain\Exceptions\InvalidEntradaCineGeneroException;

final class GeneroEnum
{
    public const ACCION = 'ACCION';
    public const COMEDIA = 'COMEDIA';
    public const DRAMA = 'DRAMA';
    public const TERROR = 'TERROR';
    public const CIENCIA_FICCION = 'CIENCIA_FICCION';
    public const ANIMACION = 'ANIMACION';
    public const ROMANCE = 'ROMANCE';
    public const THRILLER = 'THRILLER';
    public const DOCUMENTAL = 'DOCUMENTAL';
    public const FANTASIA = 'FANTASIA';

    public static function normalize(string $value): string
    {
        return strtoupper(str_replace(' ', '_', trim($value)));
    }

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

    public static function ensureIsValid(string $value): string
    {
        $value = self::normalize($value);

        if (!in_array($value, self::values(), true)) {
            throw InvalidEntradaCineGeneroException::becauseValueIsInvalid($value);
        }

        return $value;
    }
}
