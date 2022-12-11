<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Place;
use Auth;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function index(Place $place, Comment $comment)
    {
        $comment = $comment->where("place_id", $place->id);
        
        $comment_list = $comment->paginate(1);
        // $comment = $comment -> get();
        return view("showComment")->with(["comments" => $comment_list,"place" => $place]);
    }
    
    public function store(CommentRequest $request, Comment $comment, Place $place)
    {
        $comment->user_id = Auth::user()->id;
        $comment->place_id = $place->id;
        $comment->comment = $request->boardComment;
        $comment->save();
        
        return redirect("/bbs/".$place->id);
    }
}
