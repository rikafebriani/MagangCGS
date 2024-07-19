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
        Schema::create('dt_jenjang', function (Blueprint $table) {
            $table->uuid('jenjang_id')->primary();
            $table->string('jenjang_nama', 50)->unique();
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