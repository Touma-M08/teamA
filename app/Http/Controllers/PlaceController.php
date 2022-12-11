<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Place;
use App\Models\Review;
use Auth;


class PlaceController extends Controller
{
    //トップページ
    public function index(){
        
        return view("top")->with(["user" => Auth::user()]);
    }
    
    public function search(Request $request, Place $place)
    {
        $places = $place;
        $query = $place->query();
        if ($request->shopName || $request->address) {
            if ($request->shopName) {
                $query->where('name', 'LIKE', "%{$request->shopName}%");
            }
            if ($request->address) {
                $query->where('address', 'LIKE', "%{$request->address}%");
            }
            $places = $query;
        }
        
        return view("search")->with(["places" => $places->get()]);
    }
    
    //お店情報登録
    public function create(Category $category)
    {
        return view("create")->with(["categories" => $category->get()]);
    }
    
    
    public function store(Request $request, Place $place, Review $review)
    {
        $input = $request["place"];
        $data = $place->where("name", $input["name"])->first();
        if (!$data) {
            $place->fill($input)->save();
            $review->place_id = $place->id;
        }else {
            $review->place_id = $data->id;
        }
        $review->review = $request->review;
        $review->user_id = Auth::user()->id;
        $review->save();
        
        $data = $place->where("name", $input["name"])->first();
        
        return redirect(route('shopDetail', $data->id));
    }
    
    //お店詳細ページ
    public function show(Place $place)
    {
        //dd($place->lat);
        return view("shopDetail")->with(["place" => $place]);
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
