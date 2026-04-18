<?php

declare(strict_types=1);

namespace Application\EntradaCine\Ports\Out;

use Domain\ValueObjects\EntradaCineId;

interface DeleteEntradaCinePort
{
    public function delete(EntradaCineId $id): void;
}
