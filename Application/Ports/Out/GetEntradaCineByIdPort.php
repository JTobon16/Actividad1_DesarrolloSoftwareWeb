<?php

interface GetEntradaCineByIdPort
{
    public function findById(string $id): ?EntradaCineModel;
}
