<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('file_proker', function (Blueprint $table) {
            $table->id();
            $table->string('nama_file', 50);
            $table->date('tanggal_perubahan')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('progress_ke');
            $table->string('url_file', 100);
            $table->unsignedBigInteger('id_proker');

            // Menambahkan kunci asing ke kolom 'id_proker' yang mengacu ke tabel 'program_kerja'
            $table->foreign('id_proker')->references('id')->on('program_kerja');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_proker');
    }
};
