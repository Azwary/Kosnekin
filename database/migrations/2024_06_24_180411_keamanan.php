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
        Schema::create('keamanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('bobot');
            $table->timestamps();
        });

        // Insert default values
        DB::table('keamanan')->insert([
            ['nama' => 'tidak ada keamanan','bobot'=>'1'],
            ['nama' => 'satpam/penjaga','bobot'=>'2'],
            ['nama' => 'CCTV','bobot'=>'3'],
            ['nama' => 'CCTV & satpam/penjaga','bobot'=>'4'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keamanan');
    }
};
