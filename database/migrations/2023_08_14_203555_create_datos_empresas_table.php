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
        Schema::create('datos_empresas', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('name');
            $table->string('rut');
            $table->string('giro');
            $table->string('address');
            $table->string('city');
            $table->string('website');
            $table->bigInteger('phone');
            $table->string('email');
            $table->string('office_hours');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_empresas');
    }
};
