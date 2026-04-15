<?php

interface GetAllEntradasCineUseCase
{
    public function execute(GetAllEntradasCineQuery $query): array;
}
