<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ukuran_ruangan extends Model
{
    use HasFactory;
    protected $table = 'ukuran_ruangan';

    protected $fillable = [
        'id',
        'nama',
        'bobot'
    ];
}
