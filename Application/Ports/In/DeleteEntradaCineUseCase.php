<?php

interface DeleteEntradaCineUseCase
{
    public function execute(DeleteEntradaCineCommand $command): void;
}
