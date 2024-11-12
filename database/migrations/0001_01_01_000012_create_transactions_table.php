<?php

use App\Enums\GlobalUsage\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use NunoMaduro\Collision\Adapters\Phpunit\State;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('acc_name')->unique();
            $table->string('acc_code')->unique();
            $table->string('acc_no');
            $table->enum('status', Status::fetch())->default(Status::PENDING);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('member_id')->nullable();
            $table->foreignId('account_id')->nullable();
            $table->string('trx_id')->unique();
            $table->decimal('amount', 10, 2);
            $table->string('note', 250)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('withdraws', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('member_id')->nullable();
            $table->foreignId('account_id')->nullable();
            $table->string('trx_id')->unique();
            $table->decimal('amount', 10, 2);
            $table->string('note', 250)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('member_id')->nullable();
            $table->foreignId('account_id')->nullable();
            $table->string('trx_id')->unique();
            $table->decimal('debit', 10, 2)->nullable();
            $table->decimal('credit', 10, 2)->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('note', 250)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('accounts');
        Schema::dropIfExists('deposits');
        Schema::dropIfExists('withdraws');
        Schema::dropIfExists('transactions');
    }
};
