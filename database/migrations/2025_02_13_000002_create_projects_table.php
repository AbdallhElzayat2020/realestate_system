<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('status', 20)->default('active');
            $table->json('name');
            $table->string('slug')->unique();
            $table->string('thumbnail')->nullable();
            $table->string('banner')->nullable();
            $table->string('main_image')->nullable();
            $table->json('description')->nullable();
            $table->text('map')->nullable();
            $table->json('images')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
