<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillsFile extends Model
{
    use HasFactory;

    protected $table = 'bills_files';

    protected $fillable = [
        'name',
        'file_name',
        'path',
        'mime_type',
        'size',
    ];
}
