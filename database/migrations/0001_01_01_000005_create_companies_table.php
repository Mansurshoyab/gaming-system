<?php

use App\Enums\GlobalUsage\Status;
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
            $table->date('estd_date')->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phone', 19)->nullable();
            $table->string('hotline', 8)->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('screenshot')->nullable();
            $table->json('social_media')->nullable();
            $table->timestamps();
            $table->softDeletes(); 
        });

        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->default(1);
            $table->string('name')->nullable();
            $table->date('estd_date')->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phone', 19)->nullable();
            $table->string('hotline', 8)->nullable();
            $table->time('opening_time')->nullable();
            $table->time('closing_time')->nullable();
            $table->json('address')->nullable();
            $table->json('social_media')->nullable();
            $table->enum('status', Status::fetch())->default(Status::PENDING);
            $table->timestamps();
            $table->softDeletes();
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
