<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Cek apakah kolom belum ada
        if (!Schema::hasColumn('daftar_kos', 'user_id')) {

            Schema::table('daftar_kos', function (Blueprint $table) {
                $table->unsignedBigInteger('user_id')->nullable()->after('id');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });

        }
    }

    public function down(): void
    {
        // Cek dulu apakah foreign key dan kolomnya ada
        if (Schema::hasColumn('daftar_kos', 'user_id')) {

            Schema::table('daftar_kos', function (Blueprint $table) {

                // Drop FK jika ada
                $fkName = 'daftar_kos_user_id_foreign';
                if (Schema::hasColumn('daftar_kos', 'user_id')) {
                    $table->dropForeign($fkName);
                }

                // Drop kolom
                $table->dropColumn('user_id');
            });

        }
    }
};
