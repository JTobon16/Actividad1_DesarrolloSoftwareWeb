<?php

declare(strict_types=1);

namespace Application\Dto\Queries;

final class GetEntradaCineByIdQuery
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = trim($id);
    }

    public function getId(): string
    {
        return $this->id;
    }
}
