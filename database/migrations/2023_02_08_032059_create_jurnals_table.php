<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnals', function (Blueprint $table) {
            $table->id();
            $table->string('id_kelas')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('nama_guru')->nullable();
            $table->string('kelas')->nullable();
            $table->string('kompetensi_keahlian')->nullable();
            $table->string('mapel')->nullable();
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->string('materi_yang_diajarkan');
            $table->string('evaluasi_perkembangan_kbm');
            $table->string('nama_siswa_yang_bersangkutan')->nullable();
            $table->string('laporan_perkembangan_siswa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurnals');
    }
};