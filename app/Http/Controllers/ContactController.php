<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HiController extends Controller
{
  public function contactus(){
     return view('pages.contact');
  }
}
