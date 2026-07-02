<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('home_lists', function (Blueprint $table) {
            // Menambahkan kolom koordinat setelah kolom status (atau sesuaikan posisi kolom Anda)
            // Menggunakan tipe decimal agar presisi menyimpan angka persentase (contoh: 45.52)
            $table->decimal('x_coordinate', 5, 2)->nullable()->after('status');
            $table->decimal('y_coordinate', 5, 2)->nullable()->after('x_coordinate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_lists', function (Blueprint $table) {
            // Drop kolom jika migrasi di-rollback
            $table->dropColumn(['x_coordinate', 'y_coordinate']);
        });
    }
};