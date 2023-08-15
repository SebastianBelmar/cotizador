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
        Schema::create('cotizacione_datos_empresa', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cotizacione_id')->unique();
            $table->foreign('cotizacione_id')->references('id')->on('cotizaciones')->onDelete('cascade');

            $table->unsignedBigInteger('datos_empresa_id')->unique();
            $table->foreign('datos_empresa_id')->references('id')->on('datos_empresas')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotizacione_datos_empresa');
    }
};
