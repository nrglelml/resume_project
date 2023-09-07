<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function  __construct() //controller da çalışan ilk fonksiyon
    {
        $this->middleware('auth');
    }

    public function index(){
       return view('layouts.admin');
    }
    public function dashboard(){
        return view('admin.dashboard');
    }

}
