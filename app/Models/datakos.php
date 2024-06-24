<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class datakos extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    // Tentukan nama tabel yang digunakan oleh model ini
    protected $table = 'kos';
    // protected $keyType = 'string';
    // protected $softDelete = true;
    // public $incrementing = false;
    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        // 'id',
        'nama_kos',
        'alamat',
        'jarak_kos',
        'biaya',
        'lokasi_pendukung',
        'keamanan',
        'ukuran_ruangan',
        'fasilitas',
        'batas_jam_malam',
        'jenis_Listrik',
        'kebersihan_Kos'
    ];
}
