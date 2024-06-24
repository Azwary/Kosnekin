<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Subkriteria extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    use HasFactory, Notifiable, SoftDeletes;

    // Tentukan nama tabel yang digunakan oleh model ini
    protected $table = 'subkriteria';
    protected $keyType = 'string';
    protected $softDelete = true;
    public $incrementing = false;
    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'id',
        'nama_subkriteria',
        'bobot'
    ];
}
