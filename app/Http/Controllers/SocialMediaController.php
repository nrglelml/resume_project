<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function list(){
        $list=SocialMedia::all();
        return view('admin.social_media-list',compact('list'));
    }

    public function addShow(Request $request){
        $id=$request->socialmediaID;
        $socialmedia=null;
        if (!(is_null($id))){
           $socialmedia=SocialMedia::find($id);
        }
        return view('admin.social_media-add',compact('socialmedia'));
    }
    public function add(Request $request){
        $data=[
            'name'=>$request->name,
            'link'=>$request->link,
            'icon'=>$request->icon,
            'order'=>$request->order,
        ];
        if ($request->status){
            $data['status']=1;
        }
        $socialmediaID=$request->socialmediaID;
        if ($socialmediaID){
            SocialMedia::where('id',$socialmediaID)->update($data);
            alert()->success('Başarılı', "Sosyal Medya hesabınız düzenlendi.")
                ->showConfirmButton('Tamam', '#3085d6')
                ->persistent(true, true);
        }
        else{
            SocialMedia::create($data);
            alert()->success('Başarılı', "Sosyal Medya hesabınız eklendi.")
                ->showConfirmButton('Tamam', '#3085d6')
                ->persistent(true, true);
        }
        return redirect()->route('admin.social_media-list');

    }
    public function changeStatus(Request $request){
        $socialmediaID=$request->socialmediaID;
        $socialmedia=SocialMedia::find($socialmediaID);
        $status=$socialmedia->status;
        $socialmedia->status=$status ? 0 : 1;
        $socialmedia->save();
        /*return redirect()->route('admin.social_media-list')->with([
            'success' => true,
            'error' => false,
        ]);*/
        return response()->json([
            'newStatus' => $socialmedia->status == 1 ? "Aktif" : "Pasif",
            'socialMediaID' => $socialmediaID,
            'status' => $socialmedia->status
        ], 200);

    }
    public function delete(Request $request){
        $socialmediaID=$request->socialmediaID;
        SocialMedia::where('id', $socialmediaID)->delete();
        alert()->success('Başarılı', "Sosyal Medya hesabınız silindi.")
            ->showConfirmButton('Tamam', '#3085d6')
            ->persistent(true, true);
    }
}
