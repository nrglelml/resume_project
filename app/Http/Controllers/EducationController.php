<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EducationAddRequest;
use App\Models\Education;

class EducationController extends Controller
{
  public function list(){
      $list = Education::all();
      return view('admin.education-list',compact('list'));
  }
  public function addShow(){
      return view('admin.education-add');
  }

  public function add(EducationAddRequest $request ){
      $status = 0;
      if (isset($request->status)){
          $status = 1;
      }
      Education::create([
          "ed_date"=>$request->ed_date,
          "university"=>$request->university,
          "department"=>$request->department,
          "description"=>$request->description,
          "status"=>$status,
      ]);

      alert()->success('Başarılı','Eğitim Bilgileri Kaydedildi.')->showConfirmButton('Tamam','#3085d6')->persistent(true,true);

      return redirect()->route('admin.education-list');
}
   public function changeStatus(Request $request){
      $id =$request->educationID;
      dd($id);

   }

   public function delete(Request $request){

   }
}
