<?php

namespace Application\Ports\Out;

use Domain\Models\EntradaCineModel;
use Domain\ValueObjects\EntradaCineId;

interface GetEntradaCineByIdPort
{
    public function findById(EntradaCineId $id): ?EntradaCineModel;
}
