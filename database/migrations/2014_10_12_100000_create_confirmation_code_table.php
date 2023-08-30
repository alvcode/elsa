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
        Schema::create('confirmation_code', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index('confirmation_code_user_idx');
            $table->string('code', 20);
            $table->string('action', 20);
            $table->timestamp('valid_to')->index('confirmation_code_valid_idx');
            $table->boolean('is_used');
        });

        Schema::table('confirmation_code', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('confirmation_code');
    }
};
