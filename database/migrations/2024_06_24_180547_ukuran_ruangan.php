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
        });

        // Insert default values
        DB::table('ukuran_ruangan')->insert([
            ['nama' => '3X3m'],
            ['nama' => '3X4m'],
            ['nama' => '3X5m'],
            ['nama' => '4X5m'],
            ['nama' => '5X5m'],
            ['nama' => '5X6m'],

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
