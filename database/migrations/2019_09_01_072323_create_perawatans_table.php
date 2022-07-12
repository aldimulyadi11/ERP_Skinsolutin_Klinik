<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerawatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perawatan', function (Blueprint $table) {
            $table->increments('kode_perawatan');
            $table->string('nama_perawatan');
            $table->string('keterangan');
            $table->integer('harga');
            $table->integer('kode_dokter')->unsigned();;
            $table->foreign('kode_dokter')->references('kode_dokter')->on('dokter');
            $table->string('high_technology');
            $table->date('tanggal_perawatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perawatans');
    }
}
