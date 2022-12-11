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
    public function create()
    {
        return view("create");
    }
    
    
    public function store(Request $request, Place $place, Review $review)
    {
        $input = $request["place"];
        $place->fill($input)->save();
        
        $review->review = $request->review;
        $review->place_id = $place->id;
        $review->user_id = Auth::user()->id;
        $review->save();
        
        return redirect(route('shopDetail', $place->id));
    }
    
    //お店詳細ページ
    public function show(Place $place)
    {
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
