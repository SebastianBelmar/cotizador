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
        Schema::create('cotizacione_detalles_termino', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cotizacione_id');
            $table->foreign('cotizacione_id')->references('id')->on('cotizaciones')->onDelete('cascade');

            $table->unsignedBigInteger('detalles_termino_id');
            $table->foreign('detalles_termino_id')->references('id')->on('detalles_terminos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizacione_detalles_termino');
    }
};
