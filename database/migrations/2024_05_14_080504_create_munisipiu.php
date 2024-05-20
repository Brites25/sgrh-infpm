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

        Schema::create('munisipiu', function (Blueprint $table) {
            $table->bigInteger('id_munisipiu')->primary()->nullable(false)->autoIncrement();
            $table->string('naran_munisipiu', 100)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('munisipiu');
    }
};
