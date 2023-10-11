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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('nama_role');
            $table->integer('periode');
            $table->unsignedBigInteger('id_kementrian');

            // Menambahkan kunci asing ke kolom 'id_kementrian' yang mengacu ke tabel 'kementrian'
            $table->foreign('id_kementrian')->references('id')->on('kementrian')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
