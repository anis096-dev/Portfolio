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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('date_of_birth')->nullable();
            $table->string('location')->nullable();
            $table->string('phone')->nullable();
            $table->string('bio')->nullable();
            $table->string('occupation')->nullable();
            $table->string('medium')->nullable();
            $table->string('twitter')->nullable();
            $table->string('dribble')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('CV_drive')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
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
