<?php

namespace App\Http\Controllers;

use DB;
use App\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;

class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kode_admin = Session::get('kode_admin');
        $nama = Session::get('nama');
        $produk=DB::table('produk')->get();

        return view('dataProduk',compact('produk','kode_admin','nama'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(),
        [
            'nama_produk' => 'required|unique:produk',
            'ukuran' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'keterangan' => 'required',
            'stok_minimum' => 'required',
        ]
        );

        if($validator->fails()){
            return redirect('dataproduk')->with('danger','Produk Telah Tersedia !');
        }

        DB::table('produk')->insert([
            'nama_produk' => $request->nama_produk,
            'ukuran' => $request->ukuran_produk,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'keterangan' => $request->keterangan,
            'stok_minimum' => $request->stok_minimum,
            'tanggal_produk' => date('Y-m-d'),
        ]);

        return redirect('dataProduk')->with('alert alert-success alert-dismissible','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kode_produk)
    {
        $kode_admin = Session::get('kode_admin');
        $nama = Session::get('nama');

         $produk=DB::table('produk')
        ->where('kode_produk',$kode_produk)
        ->get();
        return view('produk.edit',compact('produk','kode_produk','nama'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('produk')->where('kode_produk',$request->kode_produk)->update([
            'nama_produk' => $request->nama_produk,
            'ukuran' => $request->ukuran_produk,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'keterangan' => $request->keterangan,
            'stok_minimum' => $request->stok_minimum,
            'tanggal_produk' => date('Y-m-d'),
        ]);
        return redirect('dataProduk')->with('alert alert-success alert-dismissible','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_produk)
    {
        DB::table('produk')->where('kode_produk',$kode_produk)->delete();
        return redirect('dataProduk')->with('alert alert-success alert-dismissible','Data berhasil dihapus');
    }
}
