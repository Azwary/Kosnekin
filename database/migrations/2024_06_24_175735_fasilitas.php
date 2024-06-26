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
            $table->string('bobot');
            $table->timestamps();
        });

        // Insert default values
        DB::table('fasilitas')->insert([
            ['nama' => 'kasur,lemari','bobot'=>'1'],
            ['nama' => 'kasur,lemari,kipas','bobot'=>'2'],
            ['nama' => 'kasur,lemari,kipas/Ac,kamar mandi dalam','bobot'=>'3'],
            ['nama' => 'kasur,lemari,kipas/Ac,kamar mandi dalam, Wifi & parkiran luas','bobot'=>'4'],
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
