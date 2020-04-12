<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Auth;
use Carbon\Carbon;
use Image;

class CategoryController extends Controller
{
    function addcategory(){
      $categories = Category::all();
      $deleted_categories = Category::onlyTrashed()->get();
    return  view('admin.category.index', compact('categories', 'deleted_categories'));
    }
    function addcategorypost(Request $request){
      $request->validate([
        'category_name'=>'required|unique:categories,category_name'],
        [
          'category_name.required'=>'Please Add Your Category',
          'category_name.unique'=>'Please Your Category Alredy Added'
        ]);

        $category_id = Category::insertGetId([
          'category_name' => $request->category_name,
          'user_id' => Auth::user()->id,
          'created_at' => Carbon::now()
        ]);
        $uploaded_photo = $request->file('category_photo');
        $new_name = $category_id.'.'.$uploaded_photo->getClientOriginalExtension();
        $new_upload_location = base_path('public/uploads/category_photos/'.$new_name);
        Image::make($uploaded_photo)->save($new_upload_location);
        return back()->with('success_message','Category create successfully!');

      // print_r($request->category_name);
    }
    function updatedcategory($category_id){
      // echo $category_id;
      $category_name = Category::find($category_id)->category_name;
      return view('admin/category/update', compact('category_name', 'category_id'));
    }
    function updatedcategorypost(Request $request){
      Category::find($request->category_id)->update([
        'category_name' => $request->category_name
      ]);
      return redirect('add/category')->with('update_status', 'Category Update Successfully');
    }
    function deletecategory($category_id){
      echo $category_id;
      Category::find($category_id)->delete();
      return back()->with('delete_status', 'Category Deleted Successfully');
    }
    function restorecategory($category_id){
      Category::withTrashed()->find($category_id)->restore();
      return back()->with('restore_status', 'Category Restore Successfully');
    }
    function harddeletecategory($category_id){
      Category::onlyTrashed()->find($category_id)->forceDelete();
      return back()->with('force_delete_status', 'Category Force Deleted Successfully');
    }
}
