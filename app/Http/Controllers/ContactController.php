<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Contactinfo;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function contactpost(Request $request){
      $request->validate([
        'name' => 'required',
        'email' => 'required',
        'message' => 'required'
      ]);
      Contact::insert([
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request->message,
        'created_at' => Carbon::now()
      ]);
      return back()->with('message_status', 'Message Send Successfully');
    }
    function messagelist(){
      return view('admin.contact.message_list', [
        'contacts' => Contact::all()
      ]);
    }
    function contactdelete($contact_id){
      Contact::find($contact_id)->delete();
      return back()->with('contact_delete','Message delete successfully');
    }
    function contactview($contact_id){
        return view('admin\contact\message_details', [
          'message_details' => Contact::find($contact_id)->message,
          'message_name' => Contact::find($contact_id)->name,
          'message_subject' => Contact::find($contact_id)->subject
        ]);
    }
    function contactinfo(){
      return view('admin.contact.contact_info', [
        'contactinfos' => Contactinfo::all()
      ]);
    }
    function contactinfopost(Request $request){
      $request->validate([
        'address' => 'required',
        'email_address' => 'required',
        'phone_number' => 'required'
      ]);
      Contactinfo::insert([
        'address' => $request->address,
        'email_address' => $request->email_address,
        'phone_number' => $request->phone_number,
        'created_at' => Carbon::now()
      ]);
      return back()->with('contact_info_status', 'Contact info add successfully');
    }
}
