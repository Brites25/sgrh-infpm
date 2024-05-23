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
        Schema::create('departamentu', function (Blueprint $table) {
            $table->id('id_departamentu');
            $table->foreignId('id_diresaun')->references('id_diresaun')->on('diresaun')->onDelete('Cascade')->onUpdate('Cascade');
            $table->string('naran_departamentu', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departamentu');
    }
};
