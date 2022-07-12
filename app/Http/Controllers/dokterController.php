<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class dokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokter=DB::table('dokter')->get();

        return view('dataDokter',compact('dokter'));
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
        DB::table('dokter')->insert([
            'nama_dokter' => $request->nama_dokter,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'tgl_lahir' => $request->tanggal_lahir,
            'rate' => $request->rate
        ]);

        return redirect('dataDokter')->with('alert-success','Add Doctor Success !');
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
    public function edit($kode_dokter)
    {
        $dokter=DB::table('dokter')
        ->where('kode_dokter',$kode_dokter)
        ->get();
        return view('dokter.edit',compact('dokter'));
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

        DB::table('dokter')
        ->where('kode_dokter',$request->kode_dokter)
        ->update([
            'nama_dokter' => $request->nama_dokter,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'tgl_lahir' => $request->tanggal_lahir,
            'rate' => $request->rate
        ]);
        return redirect('dataDokter')->with('alert alert-success alert-dismissible','Data berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_dokter)
    {
        DB::table('dokter')
        ->where('kode_dokter',$kode_dokter)
        ->delete();
        return redirect('dataDokter')->with('alert alert-success alert-dismissible','Data berhasil dihapus');
    }
}
