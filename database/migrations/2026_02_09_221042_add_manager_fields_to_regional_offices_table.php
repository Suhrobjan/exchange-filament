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
        Schema::table('regional_offices', function (Blueprint $table) {
            $table->json('manager_name')->nullable()->after('region_code');
            $table->json('manager_position')->nullable()->after('manager_name');
            $table->string('manager_photo')->nullable()->after('manager_position');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('regional_offices', function (Blueprint $table) {
            $table->dropColumn(['manager_name', 'manager_position', 'manager_photo']);
        });
    }
};
