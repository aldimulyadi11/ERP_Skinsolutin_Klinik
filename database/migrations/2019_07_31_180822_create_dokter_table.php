<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDokterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokter', function (Blueprint $table) {
             $table->increments('kode_dokter');
            $table->string('nama_dokter');
            $table->string('alamat');
            $table->string('no_telp');
            $table->date('tgl_lahir');
            $table->string('rate');
            $table->date('tanggal_dokter');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokter');
    }
}
