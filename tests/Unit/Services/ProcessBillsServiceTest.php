<?php

namespace Tests\Unit\Services;

use App\Adapters\Contracts\MailAdapterContract;
use App\Adapters\Contracts\UploadAdapterContract;
use App\Repositories\Contracts\BillsFileRepositoryContract;
use App\Services\ProcessBillsService;
use Tests\TestCase;
use Mockery;

class ProcessBillsServiceTest extends TestCase
{
    public function testProcessMethod()
    {
        $fileId = 1;

        $billsFileRepositoryMock = Mockery::mock(BillsFileRepositoryContract::class);
        $billsFileRepositoryMock->shouldReceive('getById')
            ->once()
            ->with($fileId)
            ->andReturn([
                'id' => $fileId,
                'path' => 'uploads',
                'name' => 'test.csv',
            ]);

        $uploadAdapterMock = $this->createMock(UploadAdapterContract::class);
        $uploadAdapterMock->expects($this->once())
            ->method('path')
            ->with('uploads/test.csv')
            ->willReturn('/var/www/tests/test.csv');

        $mailAdapterMock = Mockery::mock(MailAdapterContract::class);
        $mailAdapterMock->shouldReceive('send')->times(3);

        $billsFileRepositoryMock->shouldReceive('updateFieldProcessById')
            ->once()
            ->with($fileId, 1)
            ->andReturn(true);

        $processBillsService = new ProcessBillsService(
            $billsFileRepositoryMock,
            $uploadAdapterMock,
            $mailAdapterMock
        );

        $processBillsService->process($fileId);
    }
}
