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
        Schema::table('productos', function (Blueprint $table) {
        $table->decimal('tax_cost', 10, 2)->default(0);          // Costo de impuestos[cite: 12]
        $table->decimal('manufacturing_cost', 10, 2)->default(0); // Costo de fabricación[cite: 12]
        $table->unsignedBigInteger('currency_id')->nullable();    // Identificador de la divisa base[cite: 12]
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
        $table->dropColumn(['tax_cost', 'manufacturing_cost', 'currency_id']);
        });
    }
};
