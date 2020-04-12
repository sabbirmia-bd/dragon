<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index(){
      return view('welcome');
    }
    function about(){
      $array = array('Allah','Yeah Rohomna','Y Ajiju','Y goffaru');
      return view('about', compact('array'));
    }
    function contact(){
      return view('contact');
    }
}
