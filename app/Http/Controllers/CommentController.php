<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Place;

class CommentController extends Controller
{
    public function index(Place $place, Comment $comment)
    {
        return view("")->with(["comments" -> $comment->where("place_id", $place->id)->get()]);
    }
    
    public function store(Request $request, Comment $comment, Place $place)
    {
        $comment->user_id = Auth::user()->id;
        $comment->place_id = $place->id;
        $comment->comment = $request->;
        $comment->save();
        
        return redirect("");
    }
}
