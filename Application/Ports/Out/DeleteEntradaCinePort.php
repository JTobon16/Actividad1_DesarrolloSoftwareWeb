<?php

namespace Application\Ports\Out;

interface DeleteEntradaCinePort
{
    public function delete(string $id): void;
}
