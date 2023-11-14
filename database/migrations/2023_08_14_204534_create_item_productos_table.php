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
        Schema::create('item_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('code');
            $table->string('name');
            $table->string('description');
            $table->decimal('lenght', 10, 4)->nullable();
            $table->decimal('width', 10, 4)->nullable();
            $table->unsignedInteger('quantity');
            $table->decimal('price', 10, 2);
            $table->decimal('total', 10, 2);

            $table->timestamps();

            $table->unsignedBigInteger('cotizacione_id');
            $table->foreign('cotizacione_id')->references('id')->on('cotizaciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_productos');
    }
};
