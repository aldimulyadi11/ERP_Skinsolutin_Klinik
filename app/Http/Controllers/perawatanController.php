<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class perawatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perawatan=DB::table('perawatan')
        ->select('perawatan.kode_perawatan','perawatan.nama_perawatan','perawatan.keterangan','perawatan.harga','dokter.nama_dokter','perawatan.high_technology')
        ->join('dokter','dokter.kode_dokter','=','perawatan.kode_dokter')
        ->get();

        $ubahPerawatan=DB::table('perawatan')
        ->select('perawatan.kode_perawatan','perawatan.nama_perawatan','perawatan.keterangan','perawatan.harga','dokter.kode_dokter','perawatan.high_technology')
        ->join('dokter','dokter.kode_dokter','=','perawatan.kode_dokter')
        ->get();


        $dokter=DB::table('dokter')->get();

        return view('dataPerawatan',compact('perawatan','ubahPerawatan','dokter'));
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
        DB::table('perawatan')->insert([
            'nama_perawatan' => $request->nama_perawatan,
            'keterangan' => $request->keterangan,
            'harga' => $request->harga_perawatan,
            'kode_dokter' => $request->kode_dokter,
            'high_technology' => $request->high_technology,
            'tanggal' => date('Y-m-d'),
        ]);

        return redirect('dataPerawatan')->with('alert-success','Data berhasil ditambahkan');
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
    public function edit($kode_perawatan)
    {
        $perawatan=DB::table('perawatan')
        ->join('dokter','dokter.kode_dokter','=','perawatan.kode_dokter')
        ->where('kode_perawatan',$kode_perawatan)
        ->get();

        $dokter = DB::table('dokter')->get();
        return view('perawatan.edit',compact('perawatan','dokter'));
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
        DB::table('perawatan')->where('kode_perawatan',$request->kode_perawatan)->update([
            'nama_perawatan' => $request->nama_perawatan,
            'keterangan' => $request->keterangan,
            'harga' => $request->harga_perawatan,
            'kode_dokter' => $request->kode_dokter,
            'high_technology' => $request->high_technology
        ]);

        return redirect('dataPerawatan')->with('alert-success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_perawatan)
    {
        DB::table('perawatan')->where('kode_perawatan',$kode_perawatan)->delete();
        return redirect('dataPerawatan')->with('alert alert-success alert-dismissible','Data berhasil dihapus');
    }
}
