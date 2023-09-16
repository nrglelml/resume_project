<?php

namespace App\Http\Controllers;

use App\Models\PortfolioImage;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Http\Requests\PortfolioRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class PortfolioController extends Controller
{

    public function index()
    {
        $list=Portfolio::with('featuredImage')->get();
        return view('admin.portfolio-list',compact('list'));
    }


    public function create(Request $request)
    {
        $portfolio=$request->portfolioID;
        return view('admin.portfolio-add',compact('portfolio'));
    }


    public function store(PortfolioRequest $request)
    {
        $portfolio=Portfolio::create([
            'title'=>$request->title,
            'tags'=>$request->tags,
            'about'=>$request->about,
            'website'=>$request->website,
            'keywords'=>$request->keywords,
            'description'=>$request->description,
            'status' => $request->status ? 1 : 0
        ]);
        if ($request->file('images')){
            $now=now()->format('YmdHis');
            $sayac = 0;

            foreach ($request->file('images') as $image){
                $extension=$image->getClientOriginalExtension();
                $name=$image->getClientOriginalName();
                $slugName = Str::slug($name[0], '-') . '_' . $now . '.' . $extension;
                $publicPath='public/';
                $path='portfolio/';
                Storage::putFileAs($publicPath .$path, $image , $slugName);

                PortfolioImage::create([
                    'portfolio_id' => $portfolio->id,
                    'image' => $slugName,
                    'featured' => $sayac == 0 ? 1 : 0,
                    'status' => 1
                ]);
                $sayac=1;
            }
        }
        alert()->success('Başarılı', 'Portfolio eklendi')
            ->showConfirmButton('Tamam', '#3085d6')
            ->persistent(true, true);

        return redirect()->route('portfolio.index');
    }


    public function show($id)
    {

    }



    public function edit($id)
    {
        $portfolio=Portfolio::find($id);
        return view('admin.portfolio-add',compact('portfolio'));
    }


    public function update(Request $request, $id)
    {
        $portfolio=Portfolio::where('id',$id)
            ->update([
                'title'=>$request->title,
                'tags'=>$request->tags,
                'about'=>$request->about,
                'website'=>$request->website,
                'keywords'=>$request->keywords,
                'description'=>$request->description,
                'status' => $request->status ? 1 : 0
            ]);
        alert()->success('Başarılı', 'Portfolio güncellendi')
            ->showConfirmButton('Tamam', '#3085d6')
            ->persistent(true, true);

        return redirect()->route('portfolio.index');
    }


    public function destroy($id)
    {
        try {
            $portfolio=Portfolio::find($id);
            if ($portfolio){
                $portfolio->delete();
            }
        }
        catch (\Exception $exception){
            return response()->json(['errorMessage' => $exception->getMessage()], 500);
        }
        return response()->json(['success' => true], 200);
    }

    public function changeStatus(Request $request)
    {//kopyalandığı için education olarak kaldı
        $id = $request->id;
        $newStatus = null;
        $findEducation = Portfolio::find($id);
        if ($findEducation->status)
        {
            $status = 0;
            $newStatus = "Pasif";
        }
        else
        {
            $status = 1;
            $newStatus = "Aktif";
        }

        $findEducation->status = $status;
        $findEducation->save();

        return response()->json([
            'newStatus' => $newStatus,
            'portfolioID' => $id,
            'status' => $status
        ], 200);
    }
}
