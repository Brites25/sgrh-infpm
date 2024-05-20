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
        Schema::create('lisensa', function (Blueprint $table) {
            $table->id('id_lisensa');
            $table->enum('tipu_lisensa',['Anual','Maternidade']);
            $table->date('data-hahu')->nullable();
            $table->date('data-remata')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lisensa');
    }
};
