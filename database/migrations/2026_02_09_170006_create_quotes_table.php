<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->string('commodity_code')->unique();
            $table->json('commodity_name');     // translatable
            $table->string('commodity_category'); // agriculture, metals, energy, etc.
            $table->string('contract_type')->default('spot'); // spot, forward, futures
            $table->json('delivery_basis')->nullable(); // translatable
            $table->json('delivery_region')->nullable(); // translatable
            $table->decimal('price', 15, 2)->nullable();
            $table->decimal('price_usd', 15, 2)->nullable();
            $table->string('currency')->default('UZS');
            $table->json('unit')->nullable();   // translatable: тонна, кг, etc.
            $table->decimal('change_percent', 8, 2)->nullable();
            $table->decimal('change_absolute', 15, 2)->nullable();
            $table->decimal('min_price', 15, 2)->nullable();
            $table->decimal('max_price', 15, 2)->nullable();
            $table->decimal('trade_volume', 15, 2)->nullable();
            $table->date('session_date')->nullable();
            $table->string('status')->default('active'); // active, inactive, suspended
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
