<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_kos');
            $table->string('image');
            $table->string('alamat');
            $table->string('jarak_kos');
            $table->string('biaya');
            $table->string('lokasi_pendukung');
            $table->string('keamanan');
            $table->string('ukuran_ruangan');
            $table->string('fasilitas');
            $table->string('batas_jam_malam');
            $table->string('jenis_listrik');
            $table->string('kebersihan_kos');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kos');
    }
};
