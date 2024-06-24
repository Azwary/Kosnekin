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
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
        });

        // Insert default values
        DB::table('fasilitas')->insert([
            ['nama' => 'kasur'],
            ['nama' => 'kasur,lemari'],
            ['nama' => 'kasur,lemari,kipas'],
            ['nama' => 'kasur,lemari,kipas/Ac'],
            ['nama' => 'kasur,lemari,kipas/Ac,kamar mandi dalam'],
            ['nama' => 'kasur,lemari,kipas/Ac,kamar mandi dalam, Wifi'],
            ['nama' => 'kasur,lemari,kipas/Ac,kamar mandi dalam, Wifi & parkiran luas'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitas');
    }
};
