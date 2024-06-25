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
        Schema::create('ukuran_ruangan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('bobot');
            $table->timestamps();
        });

        // Insert default values
        DB::table('ukuran_ruangan')->insert([
            ['nama' => '3X3m','bobot'=>'1'],
            ['nama' => '3X4m','bobot'=>'2'],
            ['nama' => '4X5m','bobot'=>'3'],
            ['nama' => '5X6m','bobot'=>'4'],

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ukuran_ruangan');
    }
};
