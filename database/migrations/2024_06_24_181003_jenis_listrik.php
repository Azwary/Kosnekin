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
        Schema::create('jenis_listrik', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('bobot');
            $table->timestamps();
        });

        // Insert default values
        // DB::table('jenis_listrik')->insert([
        //     ['nama' => 'Pascabayar/bulanan'],
        //     ['nama' => 'Token/listrik isi ulang'],

        // ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_listrik');
    }
};
