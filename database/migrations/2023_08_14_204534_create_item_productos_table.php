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
            $table->unsignedInteger('lenght');
            $table->unsignedInteger('width');
            $table->unsignedInteger('quantity');
            $table->decimal('price', 10, 2);

            $table->timestamps();

            $table->unsignedBigInteger('cotizacione_id')->unique();
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
