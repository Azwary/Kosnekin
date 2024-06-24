<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lokasi_pendukung', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
        });

        // Insert default values
        DB::table('lokasi_pendukung')->insert([
            ['nama' => 'dekat dengan tempat makan'],
            ['nama' => 'dekat dengan tempat makan, tempat ibadah & tempat hiburan'],
            ['nama' => 'dekat dengan tempat makan, warung, tempat ibadah & tempat hiburan'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokasi_pendukung');
    }
};
