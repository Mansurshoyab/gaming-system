<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('member_id')->nullable();
            $table->string('icon', 25)->nullable();
            $table->string('title', 50)->nullable();
            $table->string('description', 250)->nullable();
            $table->boolean('read')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('member_id')->nullable();
            $table->string('title', 100)->nullable();
            $table->string('description', 250)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('member_id')->nullable();
            $table->foreignId('ticket_id')->nullable();
            $table->text('content')->nullable();
            $table->boolean('read')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('notifications');
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('messages');
    }
};
