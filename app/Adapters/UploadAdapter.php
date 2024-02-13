<?php

namespace App\Adapters;

use App\Adapters\Contracts\UploadAdapterContract;
use Illuminate\Support\Facades\Storage;

class UploadAdapter implements UploadAdapterContract
{
    public function upload($file, $path)
    {
        return Storage::put($path, $file);
    }

    public function path($file)
    {
        return Storage::path($file);
    }
}
