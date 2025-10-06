<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kosans', function (Blueprint $table) {
            $table->string('harga_sewa')->nullable();
            $table->integer('jumlah_kamar')->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->string('luas_tanah')->nullable();
            $table->string('jarak_ke_kampus')->nullable();
            $table->text('alamat_kosan')->nullable();
            $table->string('foto_kosan')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('kosans', function (Blueprint $table) {
            $table->dropColumn([
                'harga_sewa',
                'jumlah_kamar',
                'no_hp',
                'luas_tanah',
                'jarak_ke_kampus',
                'alamat_kosan',
                'foto_kosan',
            ]);
        });
    }
};
