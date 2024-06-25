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
            $table->string('bobot');
            $table->timestamps();
        });

        // Insert default values
        DB::table('batas_jam_malam')->insert([
            ['nama' => '21:00-22.00','bobot'=>'1'],
            ['nama' => '23:00-24.00','bobot'=>'2'],
            ['nama' => '01:00-02.00','bobot'=>'3'],
            ['nama' => '24jam','bobot'=>'4'],

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
