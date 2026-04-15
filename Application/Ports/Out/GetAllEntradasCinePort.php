<?php

namespace Application\Ports\Out;

interface GetAllEntradasCinePort
{
    public function findAll(): array;
}
