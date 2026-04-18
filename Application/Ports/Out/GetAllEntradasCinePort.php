<?php

declare(strict_types=1);

namespace Application\Ports\Out;

use Domain\Models\EntradaCineModel;

interface GetAllEntradasCinePort
{
    public function findAll(): array; // array de EntradaCineModel
}
