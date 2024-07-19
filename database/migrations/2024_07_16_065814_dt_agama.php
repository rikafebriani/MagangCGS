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
        Schema::create('dt_agama', function (Blueprint $table) {
            $table->uuid('agama_id')->primary();
            $table->string('agama_kode', 20)->unique();
            $table->string('agama_nama', 20);
            $table->timestamps();
        });
   
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('dt_agama');
    
    }
};