<?php

namespace Application\Ports\Out;

use Domain\Models\EntradaCineModel;

interface SaveEntradaCinePort
{
    public function save(EntradaCineModel $entrada): EntradaCineModel;
}
