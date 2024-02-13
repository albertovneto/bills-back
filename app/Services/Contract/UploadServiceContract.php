<?php

namespace App\Services\Contract;

use App\Dto\FileDto;
use Illuminate\Http\UploadedFile;

interface UploadServiceContract
{
    public function upload(UploadedFile $file, string $path = "uploads"): ?FileDto;
}
