<?php

declare(strict_types=1);

namespace Domain\ValueObjects;

use Domain\Exceptions\InvalidUserPasswordException;

final class UserPassword
{
    private string $value;

    public function __construct(string $value)
    {
        if ($value === '') {
            throw InvalidUserPasswordException::becauseValueIsEmpty();
        }

        $this->value = $value;
    }

    public static function fromPlainText(string $raw): self
    {
        $normalized = trim($raw);

        if ($normalized === '') {
            throw InvalidUserPasswordException::becauseValueIsEmpty();
        }

        if (strlen($normalized) < 8) {
            throw InvalidUserPasswordException::becauseLengthIsTooShort(8);
        }

        return new self(password_hash($normalized, PASSWORD_BCRYPT));
    }

    public static function fromHash(string $hash): self
    {
        return new self($hash);
    }

    public function verifyPlain(string $plain): bool
    {
        return password_verify($plain, $this->value);
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(self $other): bool
    {
        return $this->value === $other->value();
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
