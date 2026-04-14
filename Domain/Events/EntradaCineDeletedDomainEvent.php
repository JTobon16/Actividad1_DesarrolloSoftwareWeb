<?php

require_once __DIR__ . '/DomainEvent.php';
require_once __DIR__ . '/../ValueObjects/EntradaCineId.php';

class EntradaCineDeletedDomainEvent extends DomainEvent
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
