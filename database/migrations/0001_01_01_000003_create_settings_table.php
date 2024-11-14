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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable();
            $table->string('label', 25)->unique();
            $table->string('description', 250)->nullable();
            $table->string('key', 25)->unique();
            $table->enum('status', Status::fetch())->default(Status::PENDING);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable();
            $table->string('label', 25)->unique();
            $table->string('description', 250)->nullable();
            $table->string('key', 25)->unique();
            $table->enum('status', Status::fetch())->default(Status::PENDING);  
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('navigations', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable();
            $table->string('guard')->default('admin'); 
            $table->string('label')->nullable();
            $table->foreignId('parent_id')->nullable();
            $table->string('route')->nullable();
            $table->string('instance')->nullable();
            $table->boolean('submenu')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('settings');
        Schema::dropIfExists('features');
        Schema::dropIfExists('navigations');
    }
};
