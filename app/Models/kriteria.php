<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kriteria extends Model
{
    use HasFactory;
    protected $table = 'kriteria';
    protected $fillable = [
        'kode',
        'nama_kriteria',
        'jenis',
        'bobot'
    ];
}
