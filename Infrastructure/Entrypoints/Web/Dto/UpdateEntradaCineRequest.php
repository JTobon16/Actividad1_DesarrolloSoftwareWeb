<?php

namespace Infrastructure\Entrypoints\Web\Dto;

class UpdateEntradaCineRequest extends CreateEntradaCineRequest
{
    public function getId(): string
    {
        return $this->get('id');
    }
}
