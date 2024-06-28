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
            $table->string('image')->nullable();
            $table->string('alamat');
            $table->foreignId('jarak_kos')->constrained('jarak')->onDelete('cascade');
            $table->foreignId('biaya')->constrained('biaya')->onDelete('cascade');
            $table->foreignId('lokasi_pendukung')->constrained('lokasi_pendukung')->onDelete('cascade');
            $table->foreignId('keamanan')->constrained('keamanan')->onDelete('cascade');
            $table->foreignId('ukuran_ruangan')->constrained('ukuran_ruangan')->onDelete('cascade');
            $table->foreignId('fasilitas')->constrained('fasilitas')->onDelete('cascade');
            $table->foreignId('batas_jam_malam')->constrained('batas_jam_malam')->onDelete('cascade');
            $table->foreignId('jenis_listrik')->constrained('jenis_listrik')->onDelete('cascade');
            $table->foreignId('kebersihan_kos')->constrained('kebersihan_kos')->onDelete('cascade');
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
