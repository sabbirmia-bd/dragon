<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testmonial;
use Carbon\Carbon;
use Image;

class TestmonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function addtestmonial(){
      return view('admin\testmonial\index', [
        'testmonials' => Testmonial::latest()->get()
      ]);
    }
    function addtestmonialpost(Request $request){
      $request->validate([
        'client_name' => 'required',
        'client_title' => 'required',
        'client_comment' => 'required',
        'client_photo' => 'required'
      ]);
      $testmonial_id = Testmonial::insertGetId([
        'client_name' => $request->client_name,
        'client_title' => $request->client_title,
        'client_comment' => $request->client_comment,
        'client_photo' => $request->client_photo,
        'created_at' => Carbon::now()
      ]);
      $upload_photo = $request->file('client_photo');
      $new_name = $testmonial_id.'.'.$upload_photo->getClientOriginalExtension();
      $new_upload_location = base_path('public\uploads\testmonial_photo/'.$new_name);
      Image::make($upload_photo)->resize(135,105)->save($new_upload_location);

      Testmonial::find($testmonial_id)->update([
        'client_photo' => $new_name
      ]);
      return back();
    }
}
