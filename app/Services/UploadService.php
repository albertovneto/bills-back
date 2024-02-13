<?php

namespace App\Services;

use App\Adapters\Contracts\UploadAdapterContract;
use App\Dto\FileDto;
use App\Services\Contract\UploadServiceContract;
use Illuminate\Http\UploadedFile;

class UploadService implements UploadServiceContract
{
    public function __construct(
        protected readonly UploadAdapterContract $uploadAdapterContract
    ) {}

    public function upload(UploadedFile $file, string $path = 'uploads'): ?FileDto
    {
        $name = $file->hashName();
        $uploaded = $this->uploadAdapterContract->upload($file, "uploads");

        if (empty($uploaded)) {
            return null;
        }

        return new FileDto(
            name: "{$name}",
            fileName: $file->getClientOriginalName(),
            mimeType: $file->getClientMimeType(),
            path: $path,
            size: $file->getSize()
        );
    }
}
