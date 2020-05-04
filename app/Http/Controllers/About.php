<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class helloControler extends Controller
{
     public function about(){
return view('pages.about');
    }
    
    
}
