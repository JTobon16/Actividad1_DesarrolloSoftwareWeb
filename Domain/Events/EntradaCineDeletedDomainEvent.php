<?php

declare(strict_types=1);

namespace Domain\Events;

use Domain\ValueObjects\EntradaCineId;

final class EntradaCineDeletedDomainEvent extends DomainEvent
{
    private EntradaCineId $entradaId;

    public function __construct(EntradaCineId $entradaId)
    {
        parent::__construct('entrada_cine.deleted');
        $this->entradaId = $entradaId;
    }

    public function payload(): array
    {
        return [
            'id' => $this->entradaId->value(),
        ];
    }
}
