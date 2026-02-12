<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('daily_trade_results', function (Blueprint $table) {
            $table->id();
            $table->date('date')->unique();
            $table->integer('total_deals')->default(0);
            $table->decimal('total_volume', 20, 2)->default(0);
            $table->json('top_commodity')->nullable();
            $table->integer('total_participants')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_trade_results');
    }
};
