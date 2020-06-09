<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Image;
use Carbon\Carbon;
use App\Multiple_photo;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function addproduct(){
      return view('admin.product.index', [
        'categories' => Category::all(),
        'products' => Product::all()

      ]);
    }
    function addproductpost(Request $request){
      $product_id = Product::insertGetId([
        'product_name' => $request->product_name,
        'category_id' => $request->category_id,
        'product_price' => $request->product_price,
        'product_quantity' => $request->product_quantity,
        'product_short_description' => $request->product_short_description,
        'product_long_description' => $request->product_long_description,
        'product_thumbnail_photo' => $request->product_name,
        'created_at' => Carbon::now()
      ]);

      $upload_photo = $request->file('product_thumbnail_photo');
      $new_name = $product_id.'.'.$upload_photo->getClientOriginalExtension();
      $new_upload_location = base_path('public\uploads\product/'.$new_name);
      Image::make($upload_photo)->resize(600,622)->save($new_upload_location);

      Product::find($product_id)->update([
        'product_thumbnail_photo' => $new_name
      ]);
      // Multiple Photo Uploaded start
      $flag = 1;
      foreach ($request->file('product_multiple_photo') as $multiple_uploaded_photo) {
        $new_name = $product_id.'-'.$flag++.'.'.$multiple_uploaded_photo->getClientOriginalExtension();
        $new_upload_location = base_path('public\uploads\multiple_photos/'.$new_name);
        Image::make($multiple_uploaded_photo)->resize(600,622)->save($new_upload_location);
      }
      Multiple_photo::insert([
        'product_id' => $product_id,
        'photo_name' => $new_name,
        'created_at' => Carbon::now()
      ]);
      // Multiple Photo Uploaded end
      return back();
    }
    function updateproduct($product_id){
      return view('admin.product.update', [
        'product_name' => Product::find($product_id)->product_name,
        'product_price' => Product::find($product_id)->product_price,
        'product_quantity' => Product::find($product_id)->product_quantity,
        'product_thumbnail_photo' => Product::find($product_id)->product_thumbnail_photo,
        'product_id' => $product_id
      ]);
    }
    function updateproductpost(Request $request){
      if ($request->hasFile('product_thumbnail_photo')) {
        Product::find($request->product_id)->update([
        'product_name' => $request->product_name,
        'product_price' => $request->product_price,
        'product_quantity' => $request->product_quantity,
      ]);
      $delete_upload_location = base_path('public\uploads\product/'.Product::find($request->product_id)->product_thumbnail_photo);
      unlink($delete_upload_location);

      $upload_photo = $request->file('new_product_photo');
      $new_name = $request->product_id.'.'.$upload_photo->getClientOriginalExtension();
      $new_upload_location = base_path('public\uploads\product/'.$new_name);
      Image::make($upload_photo)->resize(600,622)->save($new_upload_location);

      Product::find($request->product_id)->update([
        'product_thumbnail_photo' => $new_name
      ]);
      }
      else{
        Product::find($request->product_id)->update([
        'product_name' => $request->product_name,
        'product_price' => $request->product_price,
        'product_quantity' => $request->product_quantity,
      ]);
      }
        return redirect('add/product');
    }
    function deleteproduct($product_id){
      $new_upload_location = base_path('public\uploads\product/'.Product::find($product_id)->product_thumbnail_photo);
      unlink($new_upload_location);
      Product::find($product_id)->delete();
      return redirect('add/product');
    }

}
