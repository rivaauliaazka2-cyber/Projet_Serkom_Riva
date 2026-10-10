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
         Schema::create('profil_sekolah', function (Blueprint $table) {
            $table->uuid('id_profil')->primary();
            $table->string('nama_sekolah');
            $table->string('kepala_sekolah')->nullable();
            $table->string('foto')->nullable();
            $table->string('logo')->nullable();
            $table->string('npsn')->nullable();
            $table->text('alamat')->nullable();
            $table->text('visi_misi')->nullable();
            $table->year('tahun_berdiri')->nullable();
            $table->text('deskripsi')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_sekolah');
    }
};
