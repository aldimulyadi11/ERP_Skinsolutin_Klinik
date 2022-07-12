<?php

namespace App\Http\Controllers;

use App\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        
        $data = Login::where('username',$username)->first(); 


        if($data){
            if($password == $data->password && $data->jabatan == 'ADMIN'){ 
                Session::put('kode_admin',$data->id);
                Session::put('nama',$data->nama);
                Session::put('login1',TRUE);
                return redirect('/adminDashboard');
            }
            // else if(Hash::check($password,$data->password) && $data->jabatan == 'KASIR' ){
            //     Session::put('kode_kasir',$data->id);
            //     Session::put('nama',$data->nama);
            //     Session::put('username',$data->username);
            //     Session::put('cabang',$data->cabang);
            //     Session::put('login2',TRUE);
            //    return redirect('/dashboard');
            // }
            else{
                return redirect('/')->with('alert','Login Gagal !');
            }
        }
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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
