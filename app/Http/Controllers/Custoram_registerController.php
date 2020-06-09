<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use Hash;

class Custoram_registerController extends Controller
{
    function customarregister(){
      return view('customarregister');
    }
    function customarregisterpost(Request $request){
      User::insert([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 2,
        'created_at' => Carbon::now()
      ]);
      return redirect('login');
    }
}
