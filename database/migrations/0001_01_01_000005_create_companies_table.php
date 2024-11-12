<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->nullable();
            $table->string('tagline', 100)->nullable();
            $table->string('description', 250)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phone', 19)->nullable();
            $table->string('hotline', 8)->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('screenshot')->nullable();
            $table->string('domain', 100)->nullable();
            $table->string('timezone', 64)->nullable();
            $table->json('social_media')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('companies');
        Schema::dropIfExists('branches');
    }
};
