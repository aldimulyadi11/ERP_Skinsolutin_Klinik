<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
             $table->increments('kode_produk');
            $table->string('nama_produk');
            $table->string('ukuran');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->integer('stok_minimum');
            $table->string('keterangan');
            $table->date('tanggal_produk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
