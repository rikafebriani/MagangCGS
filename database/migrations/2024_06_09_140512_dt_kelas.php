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
        Schema::create('dt_kelas', function (Blueprint $table) {
            $table->uuid('kelas_id')->primary();
            $table->string('kelas_kode', 25)->unique();
            $table->string('kelas_nama', 25)->unique();
            $table->string('kelas_keterangan')->nullable();
            $table->bigInteger('kelas_kapasitas')->nullable(); // Menghapus opsi primary key di sini
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
