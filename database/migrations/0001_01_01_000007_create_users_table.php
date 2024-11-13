<?php

use App\Enums\UserManagement\Approval;
use App\Enums\UserManagement\Source;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 50);
            $table->string('lastname', 50)->nullable();
            $table->string('username', 15)->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone', 19)->unique();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('otp_code', 6)->unique()->nullable();
            $table->timestamp('otp_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('role_id')->default(10);
            $table->enum('status', Approval::fetch())->default(Approval::PENDING);
            $table->boolean('verified')->default(false);
            $table->enum('source', Source::fetch())->default(Source::REGISTER);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 50);
            $table->string('lastname', 50)->nullable();
            $table->string('username', 15)->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone', 19)->unique();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('otp_code', 6)->unique()->nullable();
            $table->timestamp('otp_verified_at')->nullable();
            $table->string('password');
            $table->enum('status', Approval::fetch())->default(Approval::PENDING);
            $table->boolean('verified')->default(false);
            $table->enum('source', Source::fetch())->default(Source::REGISTER);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('member_id')->nullable();
            $table->string('email');
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->foreignId('member_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('users');
        Schema::dropIfExists('members');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
