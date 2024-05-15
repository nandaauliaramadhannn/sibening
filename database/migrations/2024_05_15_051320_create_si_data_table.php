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
        Schema::create('si_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kecamatan_id')->nullable();
            $table->tinyInteger('sasaran')->comment('1: resiko keluarga stunting, 2: anak stunting');
            $table->string('nama_kegiatan');
            $table->string('jumlah_sasaran');
            $table->string('lokus_kegiatan');
            $table->tinyInteger('sumber_anggaran')->comment('1: no pemerintah, 2: pemerintah');
            $table->date('waktu_pelaksanaan');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('kecamatan_id')->references('id')->on('kecamatan');
            $table->unsignedBigInteger('desa_id')->nullable();
            $table->foreign('desa_id')->references('id')->on('desa');
            $table->string('alamat');
            $table->tinyInteger('jenis_aksi')->comment('1: sensitif, 2: spesifik');
            $table->string('no_pic');
            $table->string('pendukung');
            $table->string('doc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('si_data');
    }
};
