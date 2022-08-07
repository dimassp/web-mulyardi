<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ajaran_id');
            $table->string('nik_wali');
            $table->string('nama_calon');
            $table->string('nama_wali');
            $table->string('email');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('alamat');
            $table->integer('anak_ke');
            $table->integer('jumlah_saudara');
            $table->string('rt_rw');
            $table->string('desa_kelurahan');
            $table->string('kecamatan');
            $table->string('kabupaten_kota');
            $table->string('provinsi');
            $table->string('telepon');
            $table->integer('kode_pos');
            $table->string('pekerjaan');
            $table->double('jarak');
            $table->string('file_akta');
            $table->string('file_kk');
            $table->string('file_ktp');
            $table->smallInteger('status')->nullable();
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
        Schema::dropIfExists('pendaftaran');
    }
}