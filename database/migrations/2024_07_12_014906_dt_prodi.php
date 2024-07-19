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
        Schema::create('dt_prodi', function (Blueprint $table) {
            $table->uuid('prodi_id')->primary();
            $table->string('prodi_kode', 10)->unique();
            $table->string('prodi_nama', 50)->unique();
            $table->string('fakultas_kode');
            $table->string('kelas_kode');
            $table->string('jenjang_nama',50)->nullable();
            $table->enum('prodi_status',['Aktif','Nonaktif']);
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