<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use Carbon\Carbon;
use Image;

class SliderController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  function addslider(){
    return view('admin.slider.index', [
      'sliders' => Slider::all()
    ]);
  }
  function addsliderpost(Request $request){
    $request->validate([
      'slider_title' => 'required',
      'slider_description' => 'required',
      'slider_photo' => 'required'
    ]);
    $slider_id = Slider::insertGetId([
      'slider_title' => $request->slider_title,
      'slider_description' => $request->slider_description,
      'slider_photo' => $request->slider_photo,
      'created_at' => Carbon::now()
    ]);
    $upload_photo = $request->file('slider_photo');
    $new_name = $slider_id.'.'.$upload_photo->getClientOriginalExtension();
    $new_uploaded_location = base_path('public\uploads\slider_photo/'.$new_name);
    Image::make($upload_photo)->save($new_uploaded_location);

    Slider::find($slider_id)->update([
      'slider_photo' => $new_name
    ]);
    return back()->with('slider_status', 'Slider add successfully');
  }
  function deleteslider($slider_id){
    $deleted_photo_location = base_path('public/uploads/slider_photo/'.Slider::find($slider_id)->slider_photo);
    Slider::find($slider_id)->delete();
    unlink($deleted_photo_location);
    return back()->with('slider_delete_status', 'Slider deleted successfully');
  }
  function updateslider($slider_id){
    return view('admin.slider.update', [
      'slider_title' => Slider::find($slider_id)->slider_title,
      'slider_id' => $slider_id,
      'slider_photo' => Slider::find($slider_id)->slider_photo
    ]);
  }
  function updatesliderpost(Request $request){
    if ($request->hasFile('slider_photo')) {
      $deleted_photo_location = base_path('public/uploads/slider_photo/'.Slider::find($request->slider_id)->slider_photo);
      unlink($deleted_photo_location);

      $upload_photo = $request->file('slider_photo');
      $new_name = $request->slider_id.'.'.$upload_photo->getClientOriginalExtension();
      $new_uploaded_location = base_path('public\uploads\slider_photo/'.$new_name);
      Image::make($upload_photo)->save($new_uploaded_location);

      Slider::find($request->slider_id)->update([
        'slider_photo' => $new_name
      ]);

      Slider::find($request->slider_id)->update([
        'slider_title' => $request->slider_title
      ]);
    }
    else{
      Slider::find($request->slider_id)->update([
        'slider_title' => $request->slider_title
      ]);
    }
    return back();
  }
}
