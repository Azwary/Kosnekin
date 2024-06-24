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
            $table->id();
            $table->string('nama_kos');
            $table->string('alamat');
            $table->string('jarak_kos');
            $table->integer('biaya');
            $table->string('lokasi_pendukung');
            $table->string('keamanan');
            $table->string('ukuran_ruangan');
            $table->string('fasilitas');
            $table->date('batas_jam_malam');
            $table->string('jenis_Listrik');
            $table->string('kebersihan_kos');
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
