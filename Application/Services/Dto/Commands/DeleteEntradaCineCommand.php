<?php

declare(strict_types=1);

namespace Application\EntradaCine\Dto\Commands;

final class DeleteEntradaCineCommand
{
    public function __construct(private string $id) {}

    public function getId(): string
    {
        return $this->id;
    }
}
