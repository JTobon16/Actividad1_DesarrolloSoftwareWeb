<?php

namespace Application\Services\Dto\Queries;
class GetEntradaCineByIdQuery
{
    public function __construct(
        private readonly string $id
    ) {}

    public function getId(): string
    {
        return $this->id;
    }
}
