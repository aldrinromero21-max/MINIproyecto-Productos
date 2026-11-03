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
        Schema::create('product_prices', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('product_id');   // Identificador del producto[cite: 12]
        $table->unsignedBigInteger('currency_id');  // Identificador de la divisa[cite: 12]
        $table->decimal('price', 10, 2);            // Precio en la divisa especificada[cite: 12]
        $table->timestamps();

        // Llaves foráneas
        $table->foreign('product_id')->references('id')->on('productos')->onDelete('cascade');
        $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_prices');
    }
};
