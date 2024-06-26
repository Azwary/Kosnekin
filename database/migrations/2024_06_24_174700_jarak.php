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
        DB::table('jarak')->insert([
            ['nama' => '50 meter', 'bobot'=>'1'],
            ['nama' => '>50 - 250 meter', 'bobot'=>'2'],
            ['nama' => '>250 meter - 1 km', 'bobot'=>'3'],
            ['nama' => '>1 - 2,5 km', 'bobot'=>'4'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jarak');
    }
};
