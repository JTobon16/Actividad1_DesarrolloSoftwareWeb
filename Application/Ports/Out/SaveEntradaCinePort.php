<?php

declare(strict_types=1);

namespace Application\Ports\Out;

use Domain\Models\EntradaCineModel;

interface SaveEntradaCinePort
{
    public function save(EntradaCineModel $entradaCine): EntradaCineModel;
}
