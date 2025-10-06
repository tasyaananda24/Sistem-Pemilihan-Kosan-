<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('kos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_kos');
            $table->text('alamat');
            $table->double('harga');
            $table->double('jarak');
            $table->integer('fasilitas');
            $table->double('luas');
            $table->enum('status', ['pending','approved','rejected'])->default('pending');
            $table->timestamps();

            // sementara hapus dulu foreign key ini kalau bermasalah:
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('kos');
    }
};
