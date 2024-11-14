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
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });

        Schema::create('systems', function (Blueprint $table) {
            $table->id();
            $table->json('informations')->nullable();
            $table->json('variables')->nullable();
            $table->json('badges')->nullable();
            $table->json('highlights')->nullable();
            $table->text('introduction')->nullable();  
            $table->json('about')->nullable();
            $table->json('services')->nullable();
            $table->json('technology')->nullable();
            $table->json('features')->nullable();
            $table->text('backend')->nullable();
            $table->text('frontend')->nullable();
            $table->json('prerequisites')->nullable();
            $table->text('license')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable();
            $table->string('title', 25)->unique();
            $table->string('description', 250)->nullable();
            $table->string('slug', 25)->unique();
            $table->enum('status', Status::fetch())->default(Status::PENDING);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('personal_access_tokens');
        Schema::dropIfExists('systems');
        Schema::dropIfExists('modules');
    }
};
