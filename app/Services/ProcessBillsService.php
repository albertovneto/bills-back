<?php

namespace App\Services;

use App\Adapters\Contracts\MailAdapterContract;
use App\Adapters\Contracts\UploadAdapterContract;
use App\Dto\BillDto;
use App\Mail\BillsMail;
use App\Repositories\Contracts\BillsFileRepositoryContract;
use App\Services\Contract\ProcessBillsServiceContract;
use Iterator;

class ProcessBillsService implements ProcessBillsServiceContract
{
    public function __construct(
        protected readonly BillsFileRepositoryContract $billsFileRepositoryContract,
        protected readonly UploadAdapterContract $uploadAdapterContract,
        protected readonly MailAdapterContract $mailAdapterContract,
    ) {}

    public function process(int $fileId): void
    {
        $file = $this->billsFileRepositoryContract->getById($fileId);

        $fullPath = $this->uploadAdapterContract->path($file['path'].'/'.$file['name']);

        $csvContent = $this->readCsvContent($fullPath, $file['id']);
        $this->sendEmail($csvContent);

        $this->billsFileRepositoryContract->updateFieldProcessById($fileId, true);
    }

    protected function readCsvContent(string $path, int $fileId): Iterator
    {
        $file = fopen($path, 'r');

        fgetcsv($file);
        while (($row = fgetcsv($file)) !== false) {

            yield new BillDto(
                $fileId,
                $row[0],
                $row[1],
                $row[2],
                (float) $row[3],
                $row[4],
                $row[5]
            );
        }
    }

    protected function sendEmail(Iterator $list): void
    {
        foreach ($list as $line) {
            $this->mailAdapterContract->send($line->email, new BillsMail($line));
        }
    }
}
