<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('navbars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('dropdowns', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('sidebars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('navbars');
        Schema::dropIfExists('dropdowns');
        Schema::dropIfExists('sidebars');
    }
};
