<?php

namespace App\Services\Contract;

interface ProcessBillsServiceContract
{
    public function process(int $fileId): void;
}
