<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Place;
use App\Models\Review;
use App\Models\Favorite;
use App\Models\Image;
use Auth;
use App\Http\Requests\PlaceRequest;
use Cloudinary;


class PlaceController extends Controller
{
    //トップページ
    public function index(Category $category){
        
        return view("top")->with(["user" => Auth::user(), "categories" => $category->get()]);
    }
    
    public function search(Request $request, Place $place, Category $category)
    {
        $places = $place;
        $query = $place->query();
        if ($request->shopName || $request->address || $request->cat) {
            if ($request->shopName) {
                $query->where('name', 'LIKE', "%{$request->shopName}%");
            }
            if ($request->address) {
                $query->where('address', 'LIKE', "%{$request->address}%");
            }
            if ($request->cat) {
                $query->where('category_id', $request->cat);
            }
            $places = $query;
        }
        $place_list = $places->orderBy("created_at", "desc")->paginate(10);
        return view("search")->with([
            "places" => $place_list,
            "categories" => $category->get()
        ]);
    }
    
    //お店情報登録
    public function create(Category $category)
    {
        return view("create")->with(["categories" => $category->get()]);
    }
    
    
    public function store(PlaceRequest $request, Place $place, Review $review)
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
        
        
        if ($request->file('image')) {
            foreach ($request->file('image') as $img) {
                $image = new Image;
                $image->review_id = $review->id;
                
                $path = Cloudinary::upload($img->getRealPath())->getSecurePath();
                $image->image = $path;
                $image->save();
            }
        }
        
        
        
        $data = $place->where("name", $input["name"])->first();
        
        return redirect(route('shopDetail', $data->id));
    }
    
    //お店詳細ページ
    public function show(Place $place, Favorite $favorite)
    {
        return view("shopDetail")->with([
            "place" => $place,
            "favorite" => $favorite
        ]);
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
