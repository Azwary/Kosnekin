<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jarak extends Model
{
    use HasFactory;
    protected $table = 'jarak';

    protected $fillable = [
        'id',
        'nama',
    ];
}
