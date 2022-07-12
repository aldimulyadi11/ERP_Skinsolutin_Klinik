<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table='produk';
    protected $primaryKey='kode_produk';
    protected $field=['nama_produk','ukuran','harga_beli','harga_jual','stok_minimum','keterangan','tanggal_produk'];
}
