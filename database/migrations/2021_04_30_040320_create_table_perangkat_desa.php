<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePerangkatDesa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_perangkat_desa', function (Blueprint $table) {
            $table->id('id_perangkat_desa');
            $table->string('id_desa');
            $table->string('nama_perangkat_desa');
            $table->string('nip_perangkat_desa');
            $table->string('jabatan_perangkat_desa');
            $table->string('no_hp_perangkat_desa');
            $table->string('password');
            $table->string('foto_perangkat_desa');
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
        Schema::dropIfExists('tbl_perangkat_desa');
    }
}
