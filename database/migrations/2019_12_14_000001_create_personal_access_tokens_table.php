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
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->morphs('tokenable'); // For polymorphic relation to user model
            $table->string('name'); // Token name
            $table->string('token', 64)->unique(); // Hashed token
            $table->text('abilities')->nullable(); // Token abilities (optional)
            $table->timestamp('last_used_at')->nullable(); // Last time used
            $table->timestamp('expires_at')->nullable(); // Optional expiry time
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
