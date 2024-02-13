<?php

namespace App\Repositories\Contracts;

interface BillsRepositoryContract
{
    public function createMany(array $data): bool;
}
