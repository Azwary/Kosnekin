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
        Schema::create('jarak', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('bobot');
            $table->timestamps();
        });

        // Insert default values
        // DB::table('jarak')->insert([
        //     ['nama' => '50m'],
        //     ['nama' => '>50m-250m'],
        //     ['nama' => '>250m-1Km'],
        //     ['nama' => '>250Km-1Km'],
        //     ['nama' => '>1km-2,5Km'],
        // ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jarak');
    }
};
