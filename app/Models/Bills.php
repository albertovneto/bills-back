<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    use HasFactory;

    protected $table = 'bills';

    protected $fillable = [
        'bills_files_id',
        'name',
        'government_id',
        'email',
        'debt_amount',
        'debt_due_date',
        'debt_id',
    ];
}
