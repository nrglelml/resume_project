<?php

namespace App\Http\Controllers;

use App\Models\PersonalInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PersonalInfoController extends Controller
{
    public function index(){
        $info=PersonalInfo::find(1);
        return view('admin.personal_info',compact('info'));
    }
    public function update(Request $request){

        $this->validate($request,
            [
                'cv' => 'mimes:pdf,doc,docx',
                'image' => 'mimes:jpeg,jpg,png',
                'title_left' => 'required',
                'title_right' => 'required'
            ],
            [
                'cv.mimes' => 'Seçilen cv yalnızca .pdf, .doc, .docx uzantılı olabilir.',
                'image.mimes' => 'Seçilen resim yalnızca .jpeg, .jpg, .png uzantılı olabilir.',
                'title_left.required' => 'Lütfen eğitim listesinin başlığını yazın.',
                'title_right.required' => 'Lütfen deneyim listesinin başlığını yazın'
            ]);

        $info = new PersonalInfo;
        if ($request->file('cv')){
            $file=$request->file('cv');
            $extension=$file->getClientOriginalExtension();//uzantısı
            $fileOriginalName=$file->getClientOriginalName();//dosyanın ismi
            $explode=explode('.',$fileOriginalName);//cv.pdf gibi birşey gelirse  sadece ismini almak uzantısını alamamk için ayırdık

            $fileOriginalName = Str::slug($explode[0], '-') . '_' . now()->format('d-m-Y_H-i-s') . '.' . $extension;
            //Str::slug dosyadaki yazım hatalarını(ing ye göre) düzeltmeye yarıyor
            Storage::putFileAs('public/cv', $file, $fileOriginalName);//dosyayı kaydetmiş
            $info->cv = 'public/cv' . $fileOriginalName;//yeşil olan yerle birlikte dosya adını birleştirip veritabanına kaydediyor
        }
        if ($request->file('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileOriginalName = $file->getClientOriginalName();
            $explode = explode('.', $fileOriginalName);
            $fileOriginalName = Str::slug($explode[0], '-') . '_' . now()->format('d-m-Y_H-i-s') . '.' . $extension;

            Storage::putFileAs('public/image', $file, $fileOriginalName);
            $info->image = 'image/' . $fileOriginalName;

        }
        $info->main_title = $request->main_title;
        $info->about_text = $request->about_text;
        $info->btn_contact_text = $request->btn_contact_text;
        $info->btn_contact_link = $request->btn_contact_link;
        $info->small_title_left = $request->small_title_left;
        $info->title_left = $request->title_left;
        $info->small_title_right = $request->small_title_right;
        $info->title_right = $request->title_right;
        $info->full_name = $request->full_name;
        $info->task_name = $request->task_name;
        $info->birthday = $request->birthday;
        $info->website = $request->website;
        $info->phone = $request->phone;
        $info->mail = $request->mail;
        $info->address = $request->address;
        $info->languages = $request->lang;
        $info->interests = $request->interests;

        $info->save();


        alert()->success('Başarılı', "Kişisel bilgileriniz güncellendi")
            ->showConfirmButton('Tamam', '#3085d6')
            ->persistent(true, true);

        return redirect()->back();

    }
}
