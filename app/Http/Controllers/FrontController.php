<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home(){
        return view('pages.home');
    }

    public function resume(){
        return view('pages.resume');
    }

    public function portfolio(){
        return view('pages.portfolio');
    }

    public function blog(){
        return view('pages.blog');
    }

    public function contact(){
        return view('pages.contact');
    }
}
