<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;
use Carbon\Carbon;

class FaqController extends Controller
{
    function addfaq(){
      return view('admin\faq\index', [
        'faqs' => Faq::all()
      ]);
    }
    function addfaqpost(Request $request){
        $request->validate([
          'add_ask' => 'required',
          'add_ans' => 'required'
        ]);
        Faq::insert([
          'add_ask' => $request->add_ask,
          'add_ans' => $request->add_ans,
          'created_at' => Carbon::now(),
        ]);
        return back()->with('add_faq_status', 'Faq add successfully');
    }
    function deletefaq($faq_id){
      Faq::find($faq_id)->delete();
      return back()->with('delete_faq_status', 'Faq deleted successfully');
    }
}
