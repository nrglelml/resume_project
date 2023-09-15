<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\PersonalInfo;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home(){
        $educationList = Education::query()
            ->statusActive()
            ->select('ed_date','university','department','description')
            ->orderby('order','ASC')
            ->get();

        $experienceList = Experience::query()
            ->statusActive()
            ->select('date','task_name','company_name','description','status','active')
            ->orderby('order','ASC')
            ->get();



        return view('pages.home',compact('educationList','experienceList'));
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
