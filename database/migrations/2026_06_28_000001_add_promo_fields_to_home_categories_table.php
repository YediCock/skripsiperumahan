<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('home_categories', function (Blueprint $table) {
            $table->string('address')->nullable()->after('image');
            $table->string('brochure_image')->nullable()->after('address');
            $table->string('site_plan_image')->nullable()->after('brochure_image');
        });
    }

    public function down(): void
    {
        Schema::table('home_categories', function (Blueprint $table) {
            $table->dropColumn(['address', 'brochure_image', 'site_plan_image']);
        });
    }
};
