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
        Schema::create('kosans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kosan');
            $table->text('alamat');
            $table->decimal('harga', 12, 2); // bisa dipakai untuk harga per bulan
            $table->text('fasilitas')->nullable();
            $table->string('nama_pemilik');
            $table->string('hubungi', 20); // bisa dipakai untuk nomor telepon/WA
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kosans');
    }
};
