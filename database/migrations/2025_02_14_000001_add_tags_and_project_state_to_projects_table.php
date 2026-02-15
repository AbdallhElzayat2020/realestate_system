<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            if (!Schema::hasColumn('projects', 'tags')) {
                $table->json('tags')->nullable()->after('description');
            }
            if (!Schema::hasColumn('projects', 'project_state')) {
                $table->string('project_state', 50)->nullable()->after('status');
            }
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects', 'tags')) {
                $table->dropColumn('tags');
            }
            if (Schema::hasColumn('projects', 'project_state')) {
                $table->dropColumn('project_state');
            }
        });
    }
};
