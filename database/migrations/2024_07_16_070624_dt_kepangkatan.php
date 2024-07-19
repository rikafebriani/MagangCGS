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
        Schema::create('dt_kepangkatan', function (Blueprint $table) {
            $table->uuid('kepangkatan_id')->primary();
            $table->string('kepangkatan_kode', 20)->unique();
            $table->string('kepangkatan_nama', 50);
            $table->timestamps();
        });
   
        
   
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('dt_kepangkatan');
    
    
    
    }
};