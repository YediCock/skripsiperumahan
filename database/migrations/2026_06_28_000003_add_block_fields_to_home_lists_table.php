<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('home_lists', function (Blueprint $table) {
            $table->foreignId('block_id')->nullable()->constrained('blocks')->nullOnDelete()->after('category_id');
            $table->string('unit_number')->nullable()->after('block_id');
        });
    }

    public function down(): void
    {
        Schema::table('home_lists', function (Blueprint $table) {
            $table->dropForeign(['block_id']);
            $table->dropColumn(['block_id', 'unit_number']);
        });
    }
};
