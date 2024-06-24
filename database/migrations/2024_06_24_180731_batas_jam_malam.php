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
        Schema::create('batas_jam_malam', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
        });

        // Insert default values
        DB::table('batas_jam_malam')->insert([
            ['nama' => '21:00-22.00'],
            ['nama' => '22:00-23.00'],
            ['nama' => '23:00-00.00'],
            ['nama' => '00:00-01.00'],
            ['nama' => '24jam'],

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batas_jam_malam');
    }
};
