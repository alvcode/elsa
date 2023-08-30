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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('phone_number')->nullable()->unique('user_phone_number_idx');
            $table->string('email', 150)->nullable()->unique('user_email_idx');
            $table->smallInteger('validate_email_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 150)->nullable();
            $table->timestamps();
            $table->boolean('is_deleted');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
