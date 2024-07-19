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
        Schema::create('dt_ruangan', function (Blueprint $table) {
            $table->uuid('ruangan_id')->primary();
            $table->string('ruangan_kode', 20)->unique();
            $table->string('ruangan_nama', 50);
            $table->string('ruangan_kapasitas_kursi', 20);
            $table->string('ruangan_kapasitas_komputer', 20);
            $table->string('prodi_kode', 10);
            $table->timestamps();
        });
   
        
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('dt_ruangan');
    
    
    }
};