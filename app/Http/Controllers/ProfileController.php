<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function profileedit(){
      return view('admin.profile.index');
    }
    function profilepost(Request $request){
      $request->validate([
        'profile_name' => 'required'],[
        'profile_name.required' => 'Please Enter Your Name'
        ]);
        User::find(Auth::user()->id)->update([
          'name' => $request->profile_name
        ]);
        return back()->with('name_change_status', 'Name Change Successfully!!');
    }
    function passwordpost(Request $request){
      $request->validate([
        'old_password' => 'required',
        'password' => 'required',
        'confirmation_password' => 'required'
      ]);
      if($request->old_password == $request->password){
        return back()->with('old_and_new_password_match', 'Please Enter Your New Password');
      }
      $old_password_from_user =  $request->old_password;
      $password_from_user_db =  Auth::user()->password;

      if(Hash::check($old_password_from_user, $password_from_user_db)){
        User::find(Auth::user()->id)->update([
          'password' => Hash::make($request->password)
        ]);
        return back()->with('password_status', 'Password Change Successflly');
      }
      else {
        return back()->with('password_not_status', 'Old Password Is worng');
      }

    }
}
