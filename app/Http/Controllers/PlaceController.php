<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Place;
use Auth;


class PlaceController extends Controller
{
    //トップページ
    public function index(Request $request, Place $place)
    {
        $places = $place;
        $query = $place->query();
        if () {
            $query->where('name', 'LIKE', "%{}%");
        }
        if () {
            $query->where('address', 'LIKE', "%{}%");
        }
        if () {
            $query->where('category', 'LIKE', "%{}%");
        }
        $places = $query;
        
        return view("top")->with(["places" => $places->get()]);
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
        
        return redirect(route('shopDetail'));
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
        
        return redirect(route('shopDetail'));
    }
}
