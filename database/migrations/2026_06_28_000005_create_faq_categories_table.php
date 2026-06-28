<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('faq_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });

        Schema::table('faqs', function (Blueprint $table) {
            $table->foreignId('faq_category_id')->nullable()->constrained('faq_categories')->nullOnDelete()->after('id');
        });
    }

    public function down(): void
    {
        Schema::table('faqs', function (Blueprint $table) {
            $table->dropForeign(['faq_category_id']);
            $table->dropColumn('faq_category_id');
        });
        Schema::dropIfExists('faq_categories');
    }
};
