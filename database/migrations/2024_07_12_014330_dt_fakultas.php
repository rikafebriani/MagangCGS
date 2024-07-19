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
        Schema::create('dt_fakultas', function (Blueprint $table) {
            $table->uuid('fakultas_id')->primary();            
            $table->string('fakultas_kode', 10)->unique();
            $table->string('fakultas_nama', 50)->unique();
            $table->string('fakultas_dekan', 50)->nullable();
            $table->string('fakultas_alamat', 100)->nullable();
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