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
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('google_id')->nullable();

            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->string('address')->nullable();
            $table->string('address_two')->nullable();

            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();

            $table->string('status')->default(1);

            $table->rememberToken();
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
