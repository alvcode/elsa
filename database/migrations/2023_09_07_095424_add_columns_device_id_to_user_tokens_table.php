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
        Schema::table('user_tokens', function (Blueprint $table) {
            $table->string('device_id', 15)->index('user_tokens_device_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_tokens', function (Blueprint $table) {
            $table->dropColumn('device_id');
        });
    }
};
