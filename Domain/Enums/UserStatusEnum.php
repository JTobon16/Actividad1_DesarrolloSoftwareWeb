<?php

declare(strict_types=1);

namespace Domain\Enums;

use Domain\Exceptions\InvalidUserStatusException;

final class UserStatusEnum
{
    public const ACTIVE = 'ACTIVE';
    public const INACTIVE = 'INACTIVE';
    public const PENDING = 'PENDING';
    public const BLOCKED = 'BLOCKED';

    public static function normalize(string $value): string
    {
        return strtoupper(trim($value));
    }

    public static function values(): array
    {
        return [
            self::ACTIVE,
            self::INACTIVE,
            self::PENDING,
            self::BLOCKED
        ];
    }

    public static function ensureIsValid(string $value): string
    {
        $value = self::normalize($value);

        if (!in_array($value, self::values(), true)) {
            throw InvalidUserStatusException::becauseValueIsInvalid($value);
        }

        return $value;
    }
}
