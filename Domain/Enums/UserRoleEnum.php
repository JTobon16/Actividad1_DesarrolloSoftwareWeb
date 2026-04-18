<?php

declare(strict_types=1);

namespace Domain\Enums;

use Domain\Exceptions\InvalidUserRoleException;

final class UserRoleEnum
{
    public const ADMIN = 'ADMIN';
    public const MEMBER = 'MEMBER';
    public const REVIEWER = 'REVIEWER';

    public static function normalize(string $value): string
    {
        return strtoupper(trim($value));
    }

    public static function values(): array
    {
        return [
            self::ADMIN,
            self::MEMBER,
            self::REVIEWER
        ];
    }

    public static function ensureIsValid(string $value): string
    {
        $value = self::normalize($value);

        if (!in_array($value, self::values(), true)) {
            throw InvalidUserRoleException::becauseValueIsInvalid($value);
        }

        return $value;
    }
}
