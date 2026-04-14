
<?php
final class UserPassword
{
    private string $value;

    public function __construct(string $value, bool $isHashed = false)
    {
        if (!$isHashed && strlen($value) < 6) {
            throw new InvalidUserPasswordException("Password inválido");
        }

        $this->value = $isHashed
            ? $value
            : password_hash($value, PASSWORD_BCRYPT);
    }

    public function value(): string
    {
        return $this->value;
    }

    public function verify(string $plainPassword): bool
    {
        return password_verify($plainPassword, $this->value);
    }
}
