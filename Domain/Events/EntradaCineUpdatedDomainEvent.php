<?php

declare(strict_types=1);

namespace Domain\Events;

use Domain\Models\EntradaCineModel;

final class EntradaCineUpdatedDomainEvent extends DomainEvent
{
    private EntradaCineModel $entrada;

    public function __construct(EntradaCineModel $entrada)
    {
        parent::__construct('entrada_cine.updated');
        $this->entrada = $entrada;
    }

    public function payload(): array
    {
        return [
            'id'       => $this->entrada->id()->value(),
            'pelicula' => $this->entrada->pelicula()->value(),
            'sala'     => $this->entrada->sala()->value(),
            'puesto'   => $this->entrada->puesto()->value(),
        ];
    }
}
