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
        Schema::create('data_siswas', function (Blueprint $table) {
            $table->uuid('id');
            $table->foreignUuid('user_id');
            $table->string('nama_lengkap')->nullable();
            $table->string('nama_panggilan')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('alamat')->nullable();
            $table->foreignId('village_id')
                ->nullable()
                ->constrained('indonesia_villages');
            $table->string('kodepos')->nullable();
            $table->string('nik')->nullable();
            $table->string('nkk')->nullable();
            $table->string('nisn')->nullable();
            $table->string('status_ayah')->nullable();
            $table->string('nik_ayah')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('agama_ayah')->nullable();
            $table->string('pendidikan_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('penghasilan_ayah')->nullable();
            $table->string('telp_ayah')->nullable();
            $table->string('status_ibu')->nullable();
            $table->string('nik_ibu')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('agama_ibu')->nullable();
            $table->string('pendidikan_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('penghasilan_ibu')->nullable();
            $table->string('telp_ibu')->nullable();
            $table->string('hubungan_wali')->nullable();
            $table->string('nik_wali')->nullable();
            $table->string('nama_wali')->nullable();
            $table->string('agama_wali')->nullable();
            $table->string('pendidikan_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->string('penghasilan_wali')->nullable();
            $table->string('telp_wali')->nullable();
            $table->string('scan_akta')->nullable();
            $table->string('scan_surat')->nullable();
            $table->string('scan_ijazah')->nullable();
            $table->string('scan_kartu_keluarga')->nullable();
            $table->string('scan_ktp_ayah')->nullable();
            $table->string('scan_ktp_ibu')->nullable();
            $table->string('scan_ktp_wali')->nullable();
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
        Schema::dropIfExists('data_siswas');
    }
};
