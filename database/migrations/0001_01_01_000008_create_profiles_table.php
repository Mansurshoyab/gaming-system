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
        Schema::create('avatars', function (Blueprint $table) {
            $table->id();
            $table->string('image')->unique();
            $table->string('title')->unique();
            $table->string('note')->nullable();
            $table->enum('status', Status::fetch())->default(Status::PENDING);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('avatars');
        Schema::dropIfExists('profiles');
        Schema::dropIfExists('activities');
    }
};
