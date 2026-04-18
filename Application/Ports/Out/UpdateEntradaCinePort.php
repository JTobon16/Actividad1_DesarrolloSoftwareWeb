<?php

declare(strict_types=1);

namespace Application\Ports\Out;

use Domain\Models\EntradaCineModel;

interface UpdateEntradaCinePort
{
    public function update(EntradaCineModel $entradaCine): EntradaCineModel;
}
