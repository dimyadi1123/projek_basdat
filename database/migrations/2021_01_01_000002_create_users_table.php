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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 50)->unique();
            $table->string('password');
            $table->string('nim');
            $table->string('nama', 50);
            $table->string('email')->unique();
            $table->string('no_telp');
            $table->unsignedBigInteger('id_role');

            // Menambahkan kunci asing ke kolom 'id_role' yang mengacu ke tabel 'roles'
            $table->foreign('id_role')->references('id')->on('roles');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
