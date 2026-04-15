<?php

interface GetUserByEmailPort
{
    public function findByEmail(string $email): ?UserModel;
}
