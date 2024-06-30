<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kriteria', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_kriteria');
            $table->string('jenis');
            $table->integer('bobot');
            $table->softDeletes();
            $table->timestamps();
        });

        // Inserting initial data
        DB::table('kriteria')->insert([
            ['id' => 'C01', 'nama_kriteria' => 'Jarak', 'jenis' => 'Cost', 'bobot' => 15],
            ['id' => 'C02', 'nama_kriteria' => 'Biaya', 'jenis' => 'Cost', 'bobot' => 15],
            ['id' => 'C03', 'nama_kriteria' => 'Fasilitas', 'jenis' => 'Benefit', 'bobot' => 15],
            ['id' => 'C04', 'nama_kriteria' => 'Lokasi Pendukung', 'jenis' => 'Benefit', 'bobot' => 10],
            ['id' => 'C05', 'nama_kriteria' => 'Keamanan', 'jenis' => 'Benefit', 'bobot' => 10],
            ['id' => 'C06', 'nama_kriteria' => 'Ukuran Ruangan', 'jenis' => 'Benefit', 'bobot' => 15],
            ['id' => 'C07', 'nama_kriteria' => 'Batas Jam Malam', 'jenis' => 'Cost', 'bobot' => 5],
            ['id' => 'C08', 'nama_kriteria' => 'Jenis Listrik', 'jenis' => 'Benefit', 'bobot' => 5],
            ['id' => 'C09', 'nama_kriteria' => 'Kebersihan Kos', 'jenis' => 'Cost', 'bobot' => 10],
        ]);
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kriteria');
    }
};
