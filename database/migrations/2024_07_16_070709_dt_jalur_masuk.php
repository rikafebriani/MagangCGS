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
        Schema::create('dt_jalur_masuk', function (Blueprint $table) {
            $table->uuid('jalur_masuk_id')->primary();
            $table->string('jalur_masuk_kode', 20)->unique();
            $table->string('jalur_masuk_nama', 50);
            $table->timestamps();
        });
   
        
   
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('dt_jalur_masuk');
    
    
    
    
    }
};