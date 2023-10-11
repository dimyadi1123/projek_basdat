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
        Schema::create('program_kerja', function (Blueprint $table) {
            $table->id();
            $table->string('nama_proker', 50);
            $table->string('deskripsi', 500)->nullable();
            $table->integer('periode');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->unsignedBigInteger('total_progress');
            $table->unsignedBigInteger('pic');
            $table->unsignedBigInteger('id_kementrian');

            // Menambahkan kunci asing ke kolom 'pic' yang mengacu ke tabel 'users'
            $table->foreign('pic')->references('id')->on('users');
            
            // Menambahkan kunci asing ke kolom 'id_kementrian' yang mengacu ke tabel 'kementrian'
            $table->foreign('id_kementrian')->references('id')->on('kementrian');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_kerja');
    }
};
