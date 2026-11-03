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
        Schema::create('currencies', function (Blueprint $table) {
        $table->id();
        $table->string('name');          // Identificador único de la divisa[cite: 12]
        $table->string('symbol');        // Símbolo de la divisa[cite: 12]
        $table->decimal('exchange_rate', 10, 4); // Tasa de cambio de la divisa[cite: 12]
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
