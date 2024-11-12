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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('title', 25);
            $table->string('description', 250)->nullable();
            $table->string('slug', 25)->unique();
            $table->enum('status', Status::fetch())->default(Status::PENDING);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions');
    }
};
