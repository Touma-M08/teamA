<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Place;


class PlaceController extends Controller
{
    //トップページ
    public function index(Request $request, Place $place)
    {
        return view("top")->with(["places" => $place->get()]);
    }
    
    //お店情報登録
    public function create(Category $category)
    {
        return view("")->with(["categories" => $category->get()]);
    }
    
    
    public function store(Request $request, Place $place)
    {
        $input = $request[""];
        $place->fill($input)->save();
        
        return redirect("");
    }
    
    //お店詳細ページ
    public function show(Place $place)
    {
        return view("showDetail")->with(["place" => $place]);
    }
    
    
    public function edit(Place $place)
    {
        return view("")->with(["place" => $place]);
    }
    
    public function update(Request $request, Place $place)
    {
        $input = $request[""];
        $place->fill($input)->save();
        
        return redirect("");
    }
}
