<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Contactinfo;
use App\Multiple_photo;
use App\Slider;
use App\Testmonial;
use App\About;
use App\Faq;
use App\Blog;
use App\Comment;

class FrontendController extends Controller
{
    function index(){
      return view('index',[
        'categories' => Category::all(),
        'products' =>Product::latest()->limit(10)->get(),
        'sliders' => Slider::all(),
        'testmonials' => Testmonial::latest()->limit(5)->get()
      ]);
    }

    function about(){
      return view('about', [
        'abouts' => About::latest()->limit(1)->get()
      ]);
    }

    function contact(){
      return view('contact', [
        'contactinfos' => Contactinfo::latest()->limit(1)->get()
      ]);
    }
    function productdetails($product_id){
    $category_id = Product::find($product_id)->category_id;
      return view('productdetails',[
        'product_info' => Product::find($product_id),
        'related_products' => Product::where('category_id', $category_id)->where('id', '!=', $product_id)->limit(4)->get(),
        'multiple_photos' => Multiple_photo::where('product_id', $product_id)->get()
      ]);
    }
    function shop(){
      return view('shop', [
        'products' => Product::all(),
        'categorys' => Category::all()
      ]);
    }
    function faq(){
      return view('faq', [
        'faqs' => Faq::all()
      ]);
    }
    function blog(){
      return view('blog', [
        'blogs' => Blog::latest()->limit(6)->get()
      ]);
    }
    function blogdetails($blog_id){

      $category_id = Blog::find($blog_id)->category_id;
      return view('blogdetails',[
        'bloginfo' => Blog::find($blog_id),
        'categories' => Category::all(),
        'blogs' => Blog::latest()->limit(4)->get(),
        'blog_id' => Blog::find($blog_id)->id,

      ]);
    }
}
