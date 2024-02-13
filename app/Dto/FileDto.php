<?php

namespace App\Dto;

class FileDto
{
    public function __construct(
        public readonly string $name,
        public readonly string $fileName,
        public readonly string $mimeType,
        public readonly string $path,
        public readonly int $size,
        public readonly int $processed = 0
    ) {}

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'file_name' => $this->fileName,
            'mime_type' => $this->mimeType,
            'path' => $this->path,
            'size' => $this->size,
            'processed' => $this->processed
        ];
    }
}
