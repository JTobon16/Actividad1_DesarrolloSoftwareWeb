<?php

require_once __DIR__ . '/DomainEvent.php';
require_once __DIR__ . '/../Models/EntradaCineModel.php';

class EntradaCineCreatedDomainEvent extends DomainEvent
{
    private EntradaCineModel $entrada;

    public function __construct(EntradaCineModel $entrada)
    {
        parent::__construct('entrada_cine.created');
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
