<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;
use Carbon\Carbon;
use Image;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function addblog(){
      return view('admin\blog\index', [
        'categories' => Category::all()
      ]);
    }
    function addblogpost(Request $request){
      $request->validate([
        'blog_title' => 'required',
        'blog_description' => 'required',
        'blog_photo' => 'required',
      ]);
      $blog_id = Blog::insertGetId([
        'blog_title' => $request->blog_title,
        'category_id' => $request->category_id,
        'blog_description' => $request->blog_description,
        'blog_photo' => $request->blog_photo,
        'created_at' => Carbon::now(),
      ]);
      $upload_photo = $request->file('blog_photo');
      $new_name = $blog_id.'.'.$upload_photo->getClientOriginalExtension();
      $new_upload_location = base_path('public\uploads\blog_photo/'.$new_name);
      Image::make($upload_photo)->resize(500,364)->save($new_upload_location);
      Blog::find($blog_id)->update([
        'blog_photo' => $new_name
      ]);
      return back()->with('add_blog_status', 'Blog add successfully');
    }
    function bloglist(){
      return view('admin\blog\blog_list', [
        'blogs' => Blog::all()
      ]);
    }

    function deleteblog($blog_id){
      Blog::find($blog_id)->delete();
      return back()->with('blog_delete_status', 'Blog Delete Successfully');
    }
    function updateblog($blog_id){
      return view('admin\blog\update', [
        'blog_title' => Blog::find($blog_id)->blog_title,
        'blog_description' => Blog::find($blog_id)->blog_description,
        'blog_photo' => Blog::find($blog_id)->blog_photo,
        'blog_id' => $blog_id
      ]);
    }
    function updateblogpost(Request $request){
      if ($request->hasFile('new_blog_photo')) {

      $delete_upload_location = base_path('public\uploads\blog_photo/'.Blog::find($request->blog_id)->blog_photo);
      unlink($delete_upload_location);

      $upload_photo = $request->file('new_blog_photo');
      $new_name =  $request->blog_id.'.'.$upload_photo->getClientOriginalExtension();
      $new_upload_location = base_path('public\uploads\blog_photo/'.$new_name);
      Image::make($upload_photo)->resize(500,364)->save($new_upload_location);

      Blog::find($request->blog_id)->update([
        'blog_photo' =>  $new_name
      ]);

      Blog::find($request->blog_id)->update([
      'blog_title' => $request->blog_title,
      'blog_description' => $request->blog_description,
    ]);
      return redirect('blog/list')->with('blog_update_status', 'Blog update successfully');
      }
      else{
        Blog::find($request->blog_id)->update([
        'blog_title' => $request->blog_title,
        'blog_description' => $request->blog_description,
      ]);
      return redirect('blog/list')->with('blog_update_status', 'Blog update successfully');
      }
    }

}
