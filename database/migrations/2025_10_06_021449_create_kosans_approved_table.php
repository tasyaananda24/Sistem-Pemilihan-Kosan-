<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKosansApprovedTable extends Migration
{
    public function up(): void
    {
        Schema::create('kosans_approved', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_kosan');
            $table->decimal('harga_sewa', 15, 2);
            $table->integer('jumlah_kamar');
            $table->string('no_hp');
            $table->text('fasilitas')->nullable();
            $table->string('luas_tanah')->nullable();
            $table->string('jarak_ke_kampus')->nullable();
            $table->text('alamat_kosan');
            $table->string('foto_kosan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kosans_approved');
    }
}
