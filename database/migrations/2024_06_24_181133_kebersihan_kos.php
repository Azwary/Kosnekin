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
        Schema::create('kebersihan_kos', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
        });

        // Insert default values
        DB::table('kebersihan_kos')->insert([
            ['nama' => 'Kamar dan kos tidak pernah dibersihkan'],
            ['nama' => 'Kamar tidak pernah dibersihkan tetapi kos dibersihkan'],
            ['nama' => 'Kamar dibersihkan tetapi kos tidak pernah dibersihkan'],
            ['nama' => 'Kamar dan kos dibersihkan secara berkala'],

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kebersihan_kos');
    }
};
