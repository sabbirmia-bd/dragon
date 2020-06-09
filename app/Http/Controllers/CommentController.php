<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Carbon\Carbon;

class CommentController extends Controller
{
    function commentlist(){
      return view('admin\comment\index', [
        'comments' => Comment::all()
      ]);
    }
    function commentpost(Request $request){
      $request->validate([
        'name' => 'required',
        'email' => 'required',
        'comment' => 'required',
      ]);
       Comment::insert([
         'name' => $request->name,
         'blog_id' => $request->blog_id,
         'email' => $request->email,
         'comment' => $request->comment,
         'created_at' => Carbon::now()
       ]);
       return back()->with('add_comment_status', 'Comment Add Successfully');
    }
}
