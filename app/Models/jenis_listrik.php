<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_listrik extends Model
{
    use HasFactory;
    protected $table = 'jenis_listrik';

    protected $fillable = [
        'id',
        'nama',
        'bobot'
    ];
}
