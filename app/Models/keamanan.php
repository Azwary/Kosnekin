<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keamanan extends Model
{
    use HasFactory;
    protected $table = 'keamanan';

    protected $fillable = [
        'id',
        'nama',
        'bobot'
    ];
}
