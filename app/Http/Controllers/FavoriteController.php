<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Place;
use Auth;

class FavoriteController extends Controller
{
    public function index(Favorite $favorite)
    {
        return view("favorite")->with(["favorites" => $favorite->where("user_id", Auth::user()->id)->get()]);
    }
    
    public function store(Place $place, Favorite $favorite)
    {
        $favorite->place_id = $place->id;
        $favorite->user_id = Auth::user()->id;
        $favorite->save();
        
        return redirect(route("shopDetail", $place->id));
    }
}
