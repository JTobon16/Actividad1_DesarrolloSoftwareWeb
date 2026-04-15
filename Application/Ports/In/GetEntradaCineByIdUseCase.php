<?php

require_once __DIR__ . '/../../Services/Dto/Queries/GetEntradaCineByIdQuery.php';

interface GetEntradaCineByIdUseCase
{
    public function execute(GetEntradaCineByIdQuery $query): array;
}
