<?php

interface GetUserByIdPort
{
    public function findById(string $id): ?UserModel;
}
