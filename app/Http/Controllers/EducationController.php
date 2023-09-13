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
  public function addShow(Request $request){
      $id = $request->educationID;
      $education = null;
      if (!(is_null($id))){
          $education=Education::find($id);
      }
      return view('admin.education-add',compact('education'));
  }

  public function add(EducationAddRequest $request ){
      $status = 0;
      $order = $request->order;
      if (isset($request->status)){
          $status = 1;
      }
      if (isset($request->educationID))
      {
          $id = $request->educationID;
          $education= Education::where("id",$request->educationID)
              ->update([
                  "ed_date"=>$request->ed_date,
                  "university"=>$request->university,
                  "department"=>$request->department,
                  "description"=>$request->description,
                  "status"=>$status,
                  "order"=>$order ? $order : 999
              ]);

          alert()->success('Başarılı', $id . 'ID-sine ait Eğitim Bilgileri Düzenlendi.')->showConfirmButton('Tamam','#3085d6')->persistent(true,true);

          return redirect()->route('admin.education-list');
      }
      else{
          Education::create([
              "ed_date"=>$request->ed_date,
              "university"=>$request->university,
              "department"=>$request->department,
              "description"=>$request->description,
              "status"=>$status,
              "order"=>$order ? $order : 999
          ]);

          alert()->success('Başarılı','Eğitim Bilgileri Kaydedildi.')->showConfirmButton('Tamam','#3085d6')->persistent(true,true);

          return redirect()->route('admin.education-list');
      }

}
   public function changeStatus($id){
       $item = Education::find($id);

       if (!$item) {
           return abort(404);
       }

       $item->update(['status' => !$item->status]);
       //return redirect()->back()->with('success', 'Öğe durumu güncellendi.');
       //alert()->success('Başarılı','Durum Tersine Çevrildi.')->showConfirmButton('Tamam','#3085d6')->persistent(true,true);
       //return redirect()->route('admin.education-list')->with('success');
       return redirect()->route('admin.education-list')->with([
           'success' => true,
           'error' => false,
       ]);
      /* alert()->success('Başarılı','Durum Tersine Çevrildi.')
           ->html('<script>
                    Swal.fire({
                        icon: "success",
                        title: "Başarılı!",
                        text: "Durum tersine çevrildi.",
                        confirmButtonText: "Tamam",
                        confirmButtonColor: "#3085d6"
                    });
                </script>')
           ->persistent(true, true);

       return redirect()->route('admin.education-list');*/

   }
   public function delete($id){
       $item = Education::find($id);

       $item->delete();

       //return response()->redirectToRoute('admin.education-list');
      return redirect()->route('admin.education-list')->with([
           'success' => true,
           'error' => false,
       ]);
       //return response()->json([], 200);


   }

}
