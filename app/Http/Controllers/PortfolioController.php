<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{

    public function index()
    {
        return view('admin.portfolio-list');
    }


    public function create()
    {
        return view('admin.portfolio-add');
    }


    public function store(Request $request)
    {
        dd($request->all());
    }


    public function show($id)
    {

    }



    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }
}
