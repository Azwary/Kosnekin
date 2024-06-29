<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kriteria extends Model
{
    use HasFactory;
    protected $table = 'kriteria';
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'nama_kriteria',
        'jenis',
        'bobot'
    ];
}
