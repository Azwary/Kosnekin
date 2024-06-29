<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penilaian extends Model
{
    use HasFactory;
    protected $table = 'penilaian';
    protected $keyType = 'string';
    // protected $softDelete = true;
    // public $incrementing = false;
    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'id',
        'nama_kos',
        'nilai'
        // 'nama_kos',
        // 'alamat',
        // 'jarak_kos',
        // 'biaya',
        // 'lokasi_pendukung',
        // 'keamanan',
        // 'ukuran_ruangan',
        // 'fasilitas',
        // 'batas_jam_malam',
        // 'jenis_listrik',
        // 'kebersihan_kos'
    ];
}
