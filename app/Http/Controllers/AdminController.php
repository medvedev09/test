<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class AdminController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function karyawan(){
        $karyawan = Role::with('users')->where('name', 'karyawan')->get();
        
            return view('admin.karyawan',compact('karyawan'));
            }
    public function getKaryawan($id){
            return User::find($id);
    }

    public function postHapusKaryawan(Request $request){
            $input = $request->all();
            User::find($input['id'])->delete();

            return redirect('/karyawan');
    }


    public function postAddEditKaryawan(Request $request){
         $input = $request->all();
         $aksi = $input['aksi'];
       
         if($aksi == 'Update'){
        $user= User::find($input['id']);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password' => 'sometimes|nullable|string|min:6|confirmed',
 
           
        ]);


         if ($validator->fails()) {
            return redirect('/karyawan')
                        ->withErrors($validator)
                        ->withInput();
        }

      
        
        
        $user->name = $input['name'];
        $user->email = $input['email'];
     
            if(isset($input['password'])){
             $user->password = Hash::make($input['password']);
            }
        $user->save();
            return redirect('/karyawan');

         }

         if($aksi == 'Tambah'){

    	$validator = Validator::make($request->all(), [
    		'name' => 'required|string|max:255',
    		'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
           
        ]);

    		

         if ($validator->fails()) {
            return redirect('/karyawan')
                        ->withErrors($validator)
                        ->withInput();
        }


            $user = new User;
            $user->name=$input['name'];
            $user->email=$input['email'];
            $user->password= Hash::make($input['password']);
            $user->save();
            $user->roles()->attach(Role::where('name', 'karyawan')->first());
            return redirect('/karyawan');
         }

     }

}
