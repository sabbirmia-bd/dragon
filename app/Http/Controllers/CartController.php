<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Coupon;
use App\Product;
use Carbon\Carbon;

class CartController extends Controller
{
    function addtocart(Request $request){
      if(Cart::where('product_id', $request->product_id)->where('ip_address', request()->ip())->exists()){
        Cart::where('product_id', $request->product_id)->where('ip_address', request()->ip())->increment('quantity', $request->quantity);
      }
      else{
        if (Product::find($request->product_id)->product_quantity < $request->quantity) {
          return back()->with('product_not_available', 'You can not add more than available');
        }
        else {
          Cart::insert([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'ip_address' => request()->ip(),
            'created_at' => Carbon::now()
          ]);
        }

      }
      return back();
    }
    function cart($coupon_name = ''){
      if($coupon_name){
        if(Coupon::where('coupon_name', $coupon_name)->exists()){
          if(Coupon::where('coupon_name', $coupon_name)->first()->validity_till >= Carbon::now()->format('Y-m-d')){

            return view('cart', [
              'carts' => Cart::where('ip_address', request()->ip())->get(),
              'discount_amount' => Coupon::where('coupon_name', $coupon_name)->first()->discount_amount,
              'coupon_name' => $coupon_name
            ]);
          }
          else{
            return redirect('cart');
          }
        }
        else{
          return redirect('cart');
        }
      }
      else{
        return view('cart', [
          'carts' => Cart::where('ip_address', request()->ip())->get()
        ]);
      }
    }
    function cartdelete($cart_id){
      Cart::find($cart_id)->delete();
      return back();
    }
    function cartupdate(Request $request){
      foreach ($request->cart_quantity as $cart_id => $cart_quantity_update) {
        Cart::find($cart_id)->update([
          'quantity' => $cart_quantity_update
        ]);
      }
      return back();
    }
}
