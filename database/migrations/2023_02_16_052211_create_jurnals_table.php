<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalsTable extends Migration
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
            $table->string('id_kelas');
            $table->string('tanggal');
            $table->string('nama_guru');
            $table->string('kelas');
            $table->string('kompetensi_keahlian');
            $table->string('mapel');
            $table->string('waktu_mulai');
            $table->string('waktu_selesai');
            $table->string('tanggal_pengajaran');
            $table->longText('materi_yang_diajarkan');
            $table->longText('evaluasi_perkembangan_kbm');
            $table->longText('nama_siswa_yang_bersangkutan');
            $table->longText('laporan_perkembangan_siswa');
            $table->longText('lmapiran')->nullable();
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
}