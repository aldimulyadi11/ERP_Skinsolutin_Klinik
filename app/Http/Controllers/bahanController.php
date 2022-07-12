<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class bahanController extends Controller
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
        $bahan=DB::table('bahan')->get();

        return view('dataBahan',compact('bahan','kode_admin','nama'));
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
        DB::table('bahan')->insert([
            'nama_bahan' => $request->nama_bahan,
            'satuan' => $request->satuan_bahan,
            'harga' => $request->harga_bahan,
            'keterangan' => $request->keterangan,
            'stok_min' => $request->stok_min,
            'tanggal_bahan' => date('Y-m-d'),
        ]);

        return redirect('dataBahan')->with('alert alert-success alert-dismissible','Data berhasil ditambahkan');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_bahan)
    {
        DB::table('bahan')->where('kode_bahan',$kode_bahan)->update([
            'nama_bahan' => $request->namaBahan,
            'keterangan' => $request->ketBahan,
            'stok' => $request->stokBahan
        ]);
        return redirect('dataBahan')->with('alert alert-success alert-dismissible','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_bahan)
    {
        DB::table('bahan')->where('kode_bahan',$kode_bahan)->delete();
        return redirect('dataBahan')->with('alert alert-success alert-dismissible','Data berhasil dihapus');
    }
}
