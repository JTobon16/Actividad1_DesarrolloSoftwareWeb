<?php

declare(strict_types=1);

namespace Application\Services\Dto\Queries;

final class GetEntradaCineByIdQuery
{
    public function __construct(private string $id) {}

    public function getId(): string
    {
        return $this->id;
    }
}
