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
        Schema::create('main_configs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('config_code', 65)->unique('main_configs_code_idx');
            $table->string('config_value', 500);
            $table->string('config_description', 250);
            $table->string('config_type', 20);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_configs');
    }
};
