<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kebersihan_kos extends Model
{
    use HasFactory;
    protected $table = 'kebersihan_kos';

    protected $fillable = [
        'id',
        'nama',
    ];
}
