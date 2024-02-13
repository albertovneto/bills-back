<?php

namespace App\Jobs;

use App\Services\Contract\ProcessBillsServiceContract;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessBillJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $timeout = 60 * 60 * 6;

    /**
     * Create a new job instance.
     */
    public function __construct(
        protected readonly int $fileId,
    ) { }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $processBillsService = app(ProcessBillsServiceContract::class);
        $processBillsService->process($this->fileId);
    }
}
