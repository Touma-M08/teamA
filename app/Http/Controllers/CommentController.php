<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Place;
use Auth;

class CommentController extends Controller
{
    public function index(Place $place, Comment $comment)
    {
        $comment = $comment->where("place_id", $place->id)->get();
        // $comment = $comment -> get();
        return view("showComment")->with(["comments" => $comment,"place" => $place]);
    }
    
    public function store(Request $request, Comment $comment, Place $place)
    {
        $comment->user_id = Auth::user()->id;
        $comment->place_id = $place->id;
        $comment->comment = $request->boardComment;
        $comment->save();
        
        return redirect("/bbs/".$place->id);
    }
}
