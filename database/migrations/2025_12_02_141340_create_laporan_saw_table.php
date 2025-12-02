<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('laporan_saw', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('kos_id');
        $table->string('nama_kosan');
        $table->string('alamat')->nullable();
        $table->double('nilai_preferensi');
        $table->integer('ranking');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_saw');
    }
};
