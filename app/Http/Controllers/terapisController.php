<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class terapisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terapis=DB::table('terapis')
        ->get();

        return view('dataTerapis',compact('terapis'));
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
        DB::table('terapis')->insert([
            'nama_terapis' => $request->nama_terapis,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'tgl_lahir' => $request->tanggal_lahir,
            'tanggal_terapis' => date('Y-m-d'),
        ]);
        return redirect('dataTerapis')->with('alert alert-success alert-dismissible','Data berhasil ditambahkan');
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
    public function edit($kode_terapis)
    {
        $terapis=DB::table('terapis')
        ->where('kode_terapis',$kode_terapis)
        ->get();
        return view('terapis.edit',compact('terapis'));
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
        DB::table('terapis')
        ->where('kode_terapis',$request->kode_terapis)
        ->update([
            'nama_terapis' => $request->nama_terapis,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'tgl_lahir' => $request->tanggal_lahir,
        ]);
        return redirect('dataTerapis')->with('alert alert-success alert-dismissible','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_terapis)
    {
        DB::table('terapis')
        ->where('kode_terapis',$kode_terapis)
        ->delete();
        
        return redirect('dataTerapis')->with('alert alert-success alert-dismissible','Data berhasil dihapus');
    }
}
