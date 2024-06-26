<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lokasi_pendukung extends Model
{
    use HasFactory;
    protected $table = 'lokasi_pendukung';

    protected $fillable = [
        'id',
        'nama',
        'bobot'
    ];
}
