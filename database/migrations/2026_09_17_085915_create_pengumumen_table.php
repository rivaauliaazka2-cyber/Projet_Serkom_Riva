<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengumuman', function (Blueprint $table) {
            $table->uuid('id_pengumuman')->primary();
            $table->string('judul', 50);
            $table->text('isi')->nullable();
            $table->date('tanggal')->nullable();
            $table->enum('status', ['Publish', 'Draft'])->default('Draft');
            $table->uuid('id_user');
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengumuman');
    }
};
