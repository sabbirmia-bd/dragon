<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use Carbon\Carbon;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function addabout(){
      return view('admin\about\index', [
        'abouts' => About::all()
      ]);
    }
    function addaboutpost(Request $request){
      $request->validate([
        'add_about' => 'required'
      ]);
      About::insert([
        'add_about' => $request->add_about,
        'created_at' => Carbon::now()
      ]);
      return back()->with('add_about_status', 'About add successfully');
    }
    function viewabout($about_id){
        return view('admin\about\about_details', [
          'about_details' => About::find($about_id)->add_about
        ]);
    }
    function updateabout($about_id){
      return view('admin\about\update', [
        'about_id' => $about_id,
        'about' => About::find($about_id)->add_about
      ]);
    }
    function updateaboutpost(Request $request){
      About::find($request->about_id)->update([
        'add_about' => $request->update_about
      ]);
      return redirect('add/about');
    }
    function deleteabout($about_id){
      About::find($about_id)->delete();
      return back()->with('delete_about_status', 'About deleted successfully');
    }
}
