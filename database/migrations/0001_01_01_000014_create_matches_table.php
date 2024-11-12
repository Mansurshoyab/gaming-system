<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->unsigned();
            $table->foreignId('game_id')->unsigned();
            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('rounds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->unsigned();
            $table->foreignId('match_id')->unsigned();
            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('bets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->unsigned();
            $table->foreignId('match_id')->unsigned();
            $table->foreignId('round_id')->unsigned();
            $table->decimal('amount', 10, 2)->default(0);
            $table->decimal('payout', 10, 2)->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('matches');
        Schema::dropIfExists('rounds');
        Schema::dropIfExists('bets');
        Schema::dropIfExists('records');
    }
};
