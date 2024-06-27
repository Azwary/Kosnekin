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
    protected $keyType = 'string';
    protected $softDelete = true;
    public $incrementing = false;
    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'id',
        'nama_kos',
        'alamat',
        'jarak_kos',
        'biaya',
        'lokasi_pendukung',
        'keamanan',
        'ukuran_ruangan',
        'fasilitas',
        'batas_jam_malam',
        'jenis_listrik',
        'kebersihan_kos'
    ];
    public function jarak()
    {
        return $this->belongsTo(Jarak::class);
    }

    public function biaya()
    {
        return $this->belongsTo(Biaya::class, 'biaya');
    }

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class, 'fasilitas');
    }

    public function lokasiPendukung()
    {
        return $this->belongsTo(lokasi_pendukung::class, 'lokasi_pendukung');
    }

    public function keamanan()
    {
        return $this->belongsTo(Keamanan::class, 'keamanan');
    }

    public function ukuranRuangan()
    {
        return $this->belongsTo(ukuran_ruangan::class, 'ukuran_ruangan');
    }

    public function batasJamMalam()
    {
        return $this->belongsTo(batas_jam_malam::class, 'batas_jam_malam');
    }

    public function jenisListrik()
    {
        return $this->belongsTo(jenis_listrik::class, 'jenis_listrik');
    }

    public function kebersihanKos()
    {
        return $this->belongsTo(kebersihan_kos::class, 'kebersihan_kos');
    }
}
