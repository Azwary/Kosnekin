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
        });

        // Insert default values
        DB::table('keamanan')->insert([
            ['nama' => 'tidak ada keamanan'],
            ['nama' => 'satpam/penjaga'],
            ['nama' => 'CCTV & satpam/penjaga'],
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
