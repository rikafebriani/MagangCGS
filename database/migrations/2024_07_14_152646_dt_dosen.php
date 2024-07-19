<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('dt_dosen', function (Blueprint $table) {
            $table->uuid('dosen_id')->primary();
            $table->string('dosen_kode', 20)->unique();
            $table->string('dosen_nama', 50);
            $table->string('dosen_email', 50)->unique();
            $table->string('password', 255);
            $table->enum('dosen_status', ['Aktif', 'Nonaktif']);
            $table->string('dosen_foto', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
