<?php

namespace App\Repositories;

use App\Models\Bills;
use App\Repositories\Contracts\BillsRepositoryContract;

class BillsRepository implements BillsRepositoryContract
{
    public function __construct(
        protected readonly Bills $billsModel
    ) {}

    public function createMany(array $data): bool
    {
        return $this->billsModel->insert($data);
    }
}
