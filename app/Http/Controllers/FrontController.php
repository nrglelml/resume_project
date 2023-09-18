<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\PersonalInfo;
use App\Models\Portfolio;
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
        $portfolio=Portfolio::with('featuredImage')
            ->where('status',1)
            ->orderByDesc('id')
            ->get();
        return view('pages.portfolio',compact('portfolio'));
    }

    public function portfolioDetail($id){
        $portfolio=Portfolio::with('images')
            ->where('status',1)
            ->where('id',$id)
            ->first();
        if (is_null($portfolio)){
            abort('404','Portfolio bulunamadı!');
        }
        return view('pages.portfolioDetail',compact('portfolio'));
    }

    public function blog(){
        return view('pages.blog');
    }

    public function contact(){
        return view('pages.contact');
    }
}
