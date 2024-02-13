<?php

namespace App\Repositories;

use App\Models\BillsFile;
use App\Repositories\Contracts\BillsFileRepositoryContract;

class BillsFileRepository implements BillsFileRepositoryContract
{
    public function __construct(
        protected readonly BillsFile $billsFileModel
    ) {}

    public function create(array $data): int
    {
        $created = $this->billsFileModel->create($data);

        return (int) $created['id'];
    }

    public function getById(int $fileId): ?array
    {
        return $this->billsFileModel
            ->where(['id' => $fileId])
            ->first()
            ?->toArray();
    }

    public function updateFieldProcessById(int $id, int $processed): bool
    {
        return $this->billsFileModel
            ->where(['id' => $id])
            ->update(['processed' => $processed]);
    }
}
