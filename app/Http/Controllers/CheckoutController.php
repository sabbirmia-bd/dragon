<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Order;
use App\Order_list;
use App\Product;
use Carbon\Carbon;
use Auth;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function index(Request $request){
      if(Auth::User()->role == 1){
        echo "You are admin";
      }
      else{
        return view('checkout', [
          'carts' => Cart::where('ip_address', request()->ip())->get(),
          'total' => $request->total
        ]);
      }
    }
    function checkoutpost(Request $request){
      if($request->payment_option == 1){
        // $request->validate([
        //   'full_name' => 'required',
        //   'email' => 'required',
        //   'phone_number' => 'required',
        //   'country' => 'required',
        //   'address' => 'required',
        //   'post_code' => 'required',
        //   'city' => 'required',
        //   'notes' => 'required'
        // ]);
        $order_id = Order::insertGetId([
          'user_id' => Auth::User()->id,
          'full_name' => $request->full_name,
          'email' => $request->email,
          'phone_number' => $request->phone_number,
          'country' => $request->country,
          'address' => $request->address,
          'post_code' => $request->post_code,
          'city' => $request->city,
          'notes' => $request->notes,
          'payment_option' => $request->payment_option,
          'sub_total' => $request->sub_total,
          'total' => $request->total,
          'created_at' => Carbon::now()
        ]);
        foreach (Cart::where('ip_address', request()->ip())->get() as $cart) {
          Order_list::insert([
            'order_id' => $order_id,
            'user_id' => Auth::id(),
            'product_id' => $cart->product_id,
            'quantity' => $cart->quantity,
            'created_at' => Carbon::now()
          ]);
          Product::find($cart->product_id)->decrement('product_quantity', $cart->quantity);
          Cart::find($cart->id)->delete();
        }
        return redirect('/');
      }
      else{
        // echo 'Online';
        return view('stripe', [
          'request_all_data' => $request->all()
        ]);
      }

    }
}
