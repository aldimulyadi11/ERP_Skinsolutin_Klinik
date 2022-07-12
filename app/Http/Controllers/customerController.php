<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class customerController extends Controller
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
        $customer=DB::table('customer')->get();

        return view('dataCustomer',compact('customer','kode_admin','nama'));
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

        DB::table('customer')->insert([
            'nama_customer' => $request->nama_customer,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'tgl_lahir' => $request->tanggal_lahir,
            'status' => $request->status_customer,
            'tanggal_daftar' => date('Y-m-d'),
        ]);

        return redirect('dataCustomer')->with('alert alert-success alert-dismissible','Data berhasil ditambahkan');
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
    public function edit($kode_customer)
    {
        $customer=DB::table('customer')
        ->where('kode_customer',$kode_customer)
        ->get();
        return view('customer.edit',compact('customer'));
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
        DB::table('customer')
        ->where('kode_customer',$request->kode_customer)
        ->update([
            'nama_customer' => $request->nama_customer,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'tgl_lahir' => $request->tanggal_lahir,
            'status' => $request->status_customer
        ]);
        return redirect('dataCustomer')->with('alert alert-success alert-dismissible','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_customer)
    {
        DB::table('customer')->where('kode_customer',$kode_customer)->delete();
        return redirect('dataCustomer')->with('alert alert-success alert-dismissible','Data berhasil dihapus');
    }
}
