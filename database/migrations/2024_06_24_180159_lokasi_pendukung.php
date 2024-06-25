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
            $table->string('bobot');
            $table->timestamps();
        });

        // Insert default values
        DB::table('lokasi_pendukung')->insert([
            ['nama' => 'dekat dengan tempat hiburan','bobot'=>'1'],
            ['nama' => 'dekat dengan tempat makan & tempat hiburan','bobot'=>'2'],
            ['nama' => 'dekat dengan tempat makan, tempat ibadah & tempat hiburan','bobot'=>'3'],
            ['nama' => 'dekat dengan tempat makan, warung, tempat ibadah & tempat hiburan','bobot'=>'4'],
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
