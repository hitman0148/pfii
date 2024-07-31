<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function login(){
//        return view('sample')->with('title','Login');;
        return view('admin.login')->with('title','Login');;
    }
}
