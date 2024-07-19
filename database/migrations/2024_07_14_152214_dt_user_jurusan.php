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
        Schema::create('dt_user_jurusan', function (Blueprint $table) {
            $table->uuid('user_jurusan_id')->primary();
            $table->string('user_name', 50)->unique();
            $table->string('user_nama', 50);
            $table->string('user_email', 50)->unique();
            $table->string('password', 255);
            $table->string('jurusan_kode', 20);
            $table->enum('user_status', ['Aktif', 'Nonaktif']);
            $table->string('user_foto', 20);
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