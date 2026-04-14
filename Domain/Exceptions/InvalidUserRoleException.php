<?php

class InvalidUserRoleException extends InvalidArgumentException
{
    public static function becauseValueIsInvalid(string $value): self
    {
        return new self('El rol "' . $value . '" no es un rol válido.');
    }
}
