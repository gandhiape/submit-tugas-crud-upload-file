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
        Schema::create('mahasiswa', function (Blueprint $table) {
    
            $table->string('nim',25)->primary();
            $table->string('nama',);
            $table->string('gambar')->nullable();
            $table->integer('umur');
            $table->string('alamat');
            $table->string('email');
            $table->timestamps(); 
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::drop('mahasiswa');
    }
};
