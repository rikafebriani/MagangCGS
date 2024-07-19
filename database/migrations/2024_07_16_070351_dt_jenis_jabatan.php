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
        Schema::create('dt_jenis_jabatan', function (Blueprint $table) {
            $table->uuid('jenis_jabatan_id')->primary();
            $table->string('jenis_jabatan_kode', 20)->unique();
            $table->string('jenis_jabatan_nama', 50);
            $table->timestamps();
        });
   
        
   
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('dt_jenis_jabatan');
    
    
    }
};