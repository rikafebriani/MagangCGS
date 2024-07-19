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
        Schema::create('dt_mahasiswa', function (Blueprint $table) {
            $table->uuid('mahasiswa_id')->primary();
            $table->string('mahasiswa_nim', 20)->unique();
            $table->string('mahasiswa_nama', 50);
            $table->string('mahasiswa_email', 50)->unique();
            $table->string('password', 255);
            $table->string('jurusan_kode', 20);
            $table->string('fakultas_kode', 50);
            $table->enum('mahasiswa_status', ['Aktif', 'Nonaktif']);
            $table->string('mahasiswa_foto', 20);
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