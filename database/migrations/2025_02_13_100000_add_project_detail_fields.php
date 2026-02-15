<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            if (!Schema::hasColumn('projects', 'main_image')) {
                $table->string('main_image')->nullable()->after('banner');
            }
            if (!Schema::hasColumn('projects', 'map')) {
                $table->text('map')->nullable()->after('description');
            }
            if (!Schema::hasColumn('projects', 'images')) {
                $table->json('images')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects', 'main_image')) {
                $table->dropColumn('main_image');
            }
            if (Schema::hasColumn('projects', 'map')) {
                $table->dropColumn('map');
            }
            if (Schema::hasColumn('projects', 'images')) {
                $table->dropColumn('images');
            }
        });
    }
};
