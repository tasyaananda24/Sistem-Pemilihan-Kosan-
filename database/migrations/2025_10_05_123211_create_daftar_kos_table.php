<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('daftar_kos', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemilik');
            $table->string('nama_kosan');
            $table->string('harga_sewa', 50);
            $table->integer('jumlah_kamar');
            $table->string('no_hp', 20);
            $table->string('fasilitas');
            $table->string('luas_tanah', 50);
            $table->string('jarak_ke_kampus', 50);
            $table->text('alamat_kosan');
            $table->string('foto_kosan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('daftar_kos');
    }
};
