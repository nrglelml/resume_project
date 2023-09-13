<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;
use App\Http\Requests\ExperienceAddRequest;


class ExperienceController extends Controller
{
    public function list(){
        $list = Experience::all();
        return view('admin.experience-list',compact('list'));
    }

    public function addShow(Request $request){
        $id = $request->experienceID;
        $experience = null;
        if (!(is_null($id))){
            $experience=Experience::find($id);
        }
        return view('admin.experience-add',compact('experience'));
    }

    public function add(ExperienceAddRequest $request ){
        $status = 0;
        $active = 0;
        $order = $request->order;
        if (isset($request->status)){
            $status = 1;
        }
        if (isset($request->experienceID))
        {
            $id = $request->experienceID;
            $experience= Experience::where("id",$request->experienceID)
                ->update([
                    "date" => $request->date,
                    "task_name" => $request->task_name,
                    "company_name" => $request->company_name,
                    "description" => $request->description,
                    "status" => $status,
                    "active" => $active,
                    "order"=>$order ? $order : 999
                ]);
            alert()->success('Başarılı', $id . " ID'sine sahip Deneyim bilgisi güncellendi")->showConfirmButton('Tamam', '#3085d6')->persistent(true, true);

            return redirect()->route('admin.experience-list');
        }
        else{
            Experience::create([
                "task_name" => $request->task_name,
                "company_name" => $request->company_name,
                "date" => $request->date,
                "description" => $request->description,
                "status" => $status,
                "active" => $active,
                "order"=>$order ? $order : 999
            ]);

            alert()->success('Başarılı','Deneyim Bilgileri Kaydedildi.')->showConfirmButton('Tamam','#3085d6')->persistent(true,true);

            return redirect()->route('admin.experience-list');
        }

    }

    public function changeStatus(Request $request){
        $id=$request->experienceID;
        $item = Experience::find($id);

        if (!$item) {
            return abort(404);
        }

        $item->update(['status' => !$item->status]);
        return redirect()->route('admin.experience-list')->with([
            'success' => true,
            'error' => false,
        ]);

    }

    public function activeStatus(Request $request){
        $id=$request->experienceID;
        $item = Experience::find($id);

        if (!$item) {
            return abort(404);
        }

        $item->update(['active' => !$item->status]);
        return redirect()->route('admin.experience-list')->with([
            'success' => true,
            'error' => false,
        ]);

    }
    public function delete($id){
        $item = Experience::find($id);

        $item->delete();


        return redirect()->route('admin.experience-list')->with([
            'success' => true,
            'error' => false,
        ]);

    }

}
