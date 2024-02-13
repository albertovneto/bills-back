<?php

namespace App\Services;

use App\Dto\FileDto;
use App\Jobs\ProcessBillJob;
use App\Repositories\Contracts\BillsFileRepositoryContract;
use App\Services\Contract\BillsFileServiceContract;

class BillsFileService implements BillsFileServiceContract
{
    public function __construct(
        protected readonly BillsFileRepositoryContract $billsFileRepositoryContract
    ) {}

    public function create(array $data): void
    {
        $createdId = $this->billsFileRepositoryContract->create($data);

        ProcessBillJob::dispatch($createdId)->onConnection('database');
    }
}
