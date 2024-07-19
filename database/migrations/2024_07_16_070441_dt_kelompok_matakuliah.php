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
        Schema::create('dt_kelompok_matakuliah', function (Blueprint $table) {
            $table->uuid('kelompok_matakuliah_id')->primary();
            $table->string('kelompok_matakuliah_kode', 20)->unique();
            $table->string('kelompok_matakuliah_nama', 50);
            $table->timestamps();
        });
   
        
   
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('dt_kelompok_matakuliah');
    
    
    
    }
};