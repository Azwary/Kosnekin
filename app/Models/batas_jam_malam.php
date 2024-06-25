<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class batas_jam_malam extends Model
{
    use HasFactory;
    protected $table = 'batas_jam_malam';

    protected $fillable = [
        'id',
        'nama',
        'bobot'
    ];
}
