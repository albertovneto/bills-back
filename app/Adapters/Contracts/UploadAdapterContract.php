<?php

namespace App\Adapters\Contracts;

interface UploadAdapterContract
{
    public function upload($file, $path);
    public function path($file);
}
