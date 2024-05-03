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
        Schema::create('funsionariu', function (Blueprint $table) {
            $table->integer('id_funsionariu')->autoIncrement()->primary();
            $table->string('naran_funsionariu', 100)->nullable(false);
            $table->string('email_funsionariu', 100)->nullable(false);
            $table->enum('sexo', ['Mane', 'Feto'])->default('Mane');
            $table->date('data_moris')->nullable(false);
            $table->string('hela_fatin',50)->nullable(false);
            $table->string('num_kontaktu', 20)->nullable(false);
            $table->date('data_hahu_servisu')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funsionariu');
    }
};
