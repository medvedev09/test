<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Produk;
use App\Role;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.base');
    }

    public function dashboard(){

        if(Auth::user()->roles[0]->name=="karyawan"){
            return view('karyawan.dashboard');
        }

        if(Auth::user()->roles[0]->name=="admin"){
             return view('admin.dashboard');
        }

    }

    public function produk(){
        $produk = Produk::all();
         
        
        return view('karyawan.produk',compact('produk'));
        
    }

    public function getProduk($id){
            return Produk::find($id);
    }

    public function postDelProduk(Request $request){
            $input = $request->all();
            Produk::find($input['id'])->delete();

            return redirect('/produk');
    }

    public function postAddEditItem(Request $request){
         $input = $request->all();
         $aksi = $input['aksi'];
       
         if($aksi == 'Update'){
            $produk = Produk::find($input['id']);
            $produk->nama=$input['nama'];
            $produk->harga=$input['harga'];
            $produk->stock=$input['stock'];
            $produk->save();
            return redirect('/produk');

         }

         if($aksi == 'Tambah'){
            $produk = new Produk;
            $produk->nama=$input['nama'];
            $produk->harga=$input['harga'];
            $produk->stock=$input['stock'];
            $produk->save();
            return redirect('/produk');
         }

     }

     public function test(){
        return Role::with('users')->where('name', 'karyawan')->get();
     }

}
