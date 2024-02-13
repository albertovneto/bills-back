<?php

namespace App\Services\Contract;

interface BillsFileServiceContract
{
    public function create(array $data): void;
}
