<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableWarga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_warga_desa', function (Blueprint $table) {
            $table->id('id_warga');
            $table->string('id_desa');
            $table->string('nama_warga');
            $table->string('no_hp_warga');
            $table->string('tgl_lahir_warga');
            $table->string('alamat_warga');
            $table->string('foto_warga');
            $table->string('password');
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
        Schema::dropIfExists('tbl_warga_desa');
    }
}
