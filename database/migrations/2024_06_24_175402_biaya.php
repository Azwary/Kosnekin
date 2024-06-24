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
        Schema::create('biaya', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
        });

        // Insert default values
        DB::table('biaya')->insert([
            ['nama' => '<=Rp.700.000-Rp.900.000'],
            ['nama' => '>Rp.900.000-Rp.1.300.000'],
            ['nama' => '>Rp.1.300.000-Rp.1.600.000'],
            ['nama' => '>Rp.1.600.000-Rp.2.000.000'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biaya');
    }
};
