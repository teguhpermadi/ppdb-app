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
            $table->enum('status_ayah', ['masih hidup', 'meninggal dunia'])->nullable();
            $table->string('nik_ayah')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('agama_ayah')->nullable();
            $table->string('pendidikan_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('penghasilan_ayah')->nullable();
            $table->string('telp_ayah')->nullable();
            $table->enum('status_ibu', ['masih hidup', 'meninggal dunia'])->nullable();
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
