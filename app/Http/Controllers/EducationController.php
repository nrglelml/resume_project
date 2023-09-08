<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EducationController extends Controller
{
  public function list(){
      return view('admin.education');
  }
  public function addShow(){
      return view('admin.education-add');
  }
}
