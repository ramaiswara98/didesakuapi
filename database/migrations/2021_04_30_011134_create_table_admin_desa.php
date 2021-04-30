<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAdminDesa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_admin_desa', function (Blueprint $table) {
            $table->id('id_desa');
            $table->string('username');
            $table->string('password');
            $table->string('nama_desa');
            $table->string('kode_desa');
            $table->string('nama_kecamatan');
            $table->string('kode_kecamatan');
            $table->string('nama_kabupaten');
            $table->string('kode_kabupaten');
            $table->string('nama_provinsi');
            $table->string('kode_provinsi');
            $table->string('alamat_desa');
            $table->string('email_desa');
            $table->string('no_hp_desa');
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
        Schema::dropIfExists('tbl_admin_desa');
    }
}
