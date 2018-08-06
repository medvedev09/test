<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;


class KaryawanController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:karyawan');
    }

      

}
