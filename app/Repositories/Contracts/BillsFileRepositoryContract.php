<?php

namespace App\Repositories\Contracts;

interface BillsFileRepositoryContract
{
    public function create(array $data): int;
    public function getById(int $fileId): ?array;
    public function updateFieldProcessById(int $id, int $processed): bool;
}
